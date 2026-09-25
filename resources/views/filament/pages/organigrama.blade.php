<x-filament::page>
    <div class="w-full bg-white dark:bg-gray-900 p-4 rounded-xl shadow border border-gray-200 dark:border-gray-800">
        <div id="mountNode" style="width: 100%; height: 650px;"></div>
    </div>

    <!-- CDN fijado a la versión 4.8.24 -->
    <script src="https://cdn.jsdelivr.net/npm/@antv/g6@4.8.24/dist/g6.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const flatData = @json($directivos);

            // 1. REGISTRAR EL NODO PERSONALIZADO (TARJETA CON FOTO)
            G6.registerNode('card-node', {
                draw(cfg, group) {
                    const width = 270;
                    const height = 80;

                    // Contenedor principal (Caja blanca con borde suave y sombra)
                    const shape = group.addShape('rect', {
                        attrs: {
                            x: 0,
                            y: 0,
                            width: width,
                            height: height,
                            fill: '#FFFFFF',
                            stroke: '#6366F1', // Color Índigo de Filament
                            lineWidth: 2,
                            radius: 10,
                            shadowColor: 'rgba(0, 0, 0, 0.08)',
                            shadowBlur: 10,
                            shadowOffsetY: 4,
                        },
                        name: 'main-box',
                    });

                    // Imagen de perfil / Avatar
                    // Si el registro no tiene foto, genera un avatar con las iniciales del nombre
                    const avatarUrl = cfg.img || cfg.foto || 
                        `https://ui-avatars.com/api/?name=${encodeURIComponent(cfg.nombre)}&background=6366f1&color=fff`;

                    group.addShape('image', {
                        attrs: {
                            x: 15,
                            y: 15,
                            width: 50,
                            height: 50,
                            img: avatarUrl,
                        },
                        name: 'avatar-image',
                    });

                    // Nombre del Empleado (Texto en Negrita)
                    const nombreTexto = cfg.nombre.length > 22 
                        ? cfg.nombre.substring(0, 22) + '...' 
                        : cfg.nombre;

                    group.addShape('text', {
                        attrs: {
                            x: 75,
                            y: 22,
                            text: nombreTexto,
                            fill: '#111827',
                            fontSize: 13,
                            fontWeight: 'bold',
                            textBaseline: 'top',
                        },
                        name: 'node-name',
                    });

                    // Puesto del Empleado
                    const puestoTexto = cfg.puesto.length > 28 
                        ? cfg.puesto.substring(0, 28) + '...' 
                        : cfg.puesto;

                    group.addShape('text', {
                        attrs: {
                            x: 75,
                            y: 45,
                            text: puestoTexto,
                            fill: '#6B7280',
                            fontSize: 11,
                            textBaseline: 'top',
                        },
                        name: 'node-puesto',
                    });

                    return shape;
                }
            });

            // 2. CONSTRUIR EL ÁRBOL
            function buildTree(items) {
                if (!items || !items.length) return null;

                const map = {};
                const roots = [];

                items.forEach(item => {
                    map[String(item.id)] = { 
                        id: String(item.id), 
                        nombre: item.nombre || '', 
                        puesto: item.puesto || '',
                        img: item.img || item.foto || null, // Captura la URL de la foto
                        children: [] 
                    };
                });

                items.forEach(item => {
                    const pid = item.padre_id ?? item.id_padre ?? item.pid ?? item.parent_id;
                    const parentKey = (pid !== null && pid !== undefined && pid !== 0 && pid !== "0") 
                        ? String(pid) 
                        : null;

                    if (parentKey && map[parentKey]) {
                        map[parentKey].children.push(map[String(item.id)]);
                    } else {
                        roots.push(map[String(item.id)]);
                    }
                });

                if (roots.length === 1) return roots[0];

                if (roots.length > 1) {
                    return {
                        id: 'root-general',
                        nombre: 'Organización',
                        puesto: 'Dirección General',
                        img: null,
                        children: roots
                    };
                }

                return null;
            }

            const treeData = buildTree(flatData);
            const container = document.getElementById('mountNode');

            // 3. INICIALIZAR EL GRAFO USANDO EL NODO PERSONALIZADO
            const graph = new G6.TreeGraph({
                container: 'mountNode',
                width: container.clientWidth || 800,
                height: 650,
                modes: {
                    default: [
                        'drag-canvas',
                        'zoom-canvas',
                        'drag-node'
                    ],
                },
                defaultNode: {
                    type: 'card-node', // Asignamos la tarjeta personalizada que registramos
                },
                defaultEdge: {
                    type: 'cubic-horizontal',
                    style: {
                        stroke: '#9CA3AF',
                        lineWidth: 2,
                    },
                },
                layout: {
                    type: 'compactBox',
                    direction: 'TB',
                    getId: d => d.id,
                    getHeight: () => 80,  // Alto de la tarjeta
                    getWidth: () => 270,  // Ancho de la tarjeta
                    getVGap: () => 40,
                    getHGap: () => 20,
                },
            });

            graph.data(treeData);
            graph.render();
            graph.fitView();

            // --- Lógica de Arrastrar y Soltar (Drag and Drop) ---
            let draggedNodeId = null;

            graph.on('node:dragstart', (e) => {
                draggedNodeId = e.item.get('id');
            });

            graph.on('node:drop', (e) => {
                const targetNode = e.item;
                const newParentId = targetNode.get('id');

                if (!draggedNodeId || !newParentId) return;
                if (draggedNodeId === newParentId) return;
                if (newParentId === 'root-general') return;

                updateParent(draggedNodeId, newParentId);
            });

            function updateParent(childId, newParentId) {
                fetch("{{ route('organigrama.update-padre') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        child_id: childId,
                        new_parent_id: newParentId
                    })
                })
                .then(async (res) => {
                    if (res.ok) {
                        location.reload();
                    } else {
                        const data = await res.json();
                        alert(data.error || "Error al actualizar");
                    }
                });
            }
        });
    </script>
</x-filament::page>