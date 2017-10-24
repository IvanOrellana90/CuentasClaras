
$("#grid-selection").bootgrid({
    ajax: true,
    labels: {
        noResults: "No se encontraron resultados",
        infos: ""
    },
    url: "/api/data/basic",
    navigation: 0,
    formatters: {
        "link": function(column, row)
        {
            return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";
        }
    }
})

