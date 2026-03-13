<x-filament::page>
    <div>
        <div id="orgchart" style="height: 600px;"></div>
    </div>

    <!-- Librería OrgChartJS -->
    <link href="https://cdn.jsdelivr.net/npm/@balkangraph/orgchart.js@3.9.0/orgchart.css" rel="stylesheet" />
    <script src="https://cdn.balkan.app/orgchart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chart = new OrgChart(document.getElementById("orgchart"), {
                nodeBinding: {
                    field_0: "nombre",
                    field_1: "puesto",
                    img_0: "img",
                },
                enableSearch: false,
                template: "polina",
                enableDragDrop: true,
                nodes: @json($directivos),
                nodeMouseClick: OrgChart.action.none,

            });

            chart.on('drop', function(sender, draggedNodeId, droppedNodeId) {
                updateParent(draggedNodeId, droppedNodeId);
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
                            console.log("Jerarquía actualizada");
                        } else {
                            const data = await res.json();
                            alert(data.error || "Error al actualizar");
                            location.reload(); // Restaurar vista si hubo error
                        }
                    });
            }
        });
    </script>
</x-filament::page>
