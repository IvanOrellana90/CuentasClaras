var gridUsers = $("#table-users").bootgrid({
    templates: {
        header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\">" +
        "<p class=\"{{css.search}}\"></p>" +
        "</div></div></div>"
    },
    labels: {
        noResults: "No se econtraron resultados",
        search: "Buscar",
        infos: ""
    },
    multiSort: true,
    rowCount: [5, 15, 25, -1],
    navigation: 3,
    formatters: {
        "acciones": function(column, row)
        {
            return "<a href=\"" + row.userLink + "\" class=\" command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-bullseye\"></span></a> "
        },
        "nombre": function(column, row)
        {
            return '<strong>' + row.nombre + '</strong> <br> <div class="italicTabla"><i>' + row.email + '</i></div> ';
        },
        "grupo": function(column, row)
        {
            return '<strong>' + row.grupo + '</strong>';
        },
        "total": function(column, row)
        {
            if(row.deuda > row.abono)
            {
                return '<strong class="text-red text-menu">' + row.total + '</strong>';
            } else {
                return '<strong class="text-blue text-menu">' + row.total + '</strong>';
            }
        },
        "deuda": function(column, row)
        {
            return '<strong class="text-menu">' + row.deuda + '</strong>';
        },
        "abono": function(column, row)
        {
            return '<strong class="text-menu">' + row.abono + '</strong>';
        },
    }
}).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    gridGroup.find(".command-edit").on("click", function(e)
    {

    }).end().find(".command-delete").on("click", function(e)
    {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
            title: 'Estas seguro?',
            text: "Este grupo se eliminara permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then(function () {
            window.location.href = link;
        })
    });
});

var grid = $("#table-ticket").bootgrid({
    templates: {
        header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\">" +
        "<p class=\"{{css.search}}\"></p>" +
        "<button type=\"button\" class=\"btn btn-default actionPlus\" data-toggle=\"modal\" data-target=\"#modal-ticket\">" +
        "<i class=\"fa fa-plus-square\"></i>" +
        "</button>" +
        "</div></div></div>"
    },
    labels: {
        noResults: "No se econtraron resultados",
        search: "Buscar",
        infos: ""
    },
    multiSort: true,
    rowCount: [5, 15, 25, -1],
    navigation: 3,
    formatters: {
        "acciones": function(column, row)
        {
            if( row.borrarLink == 0)
                return "<a href=\"" + row.ticketLink + "\" class=\" command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-bullseye\"></span></a> ";
            else
                return "<a href=\"" + row.ticketLink + "\" class=\" command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-bullseye\"></span></a> " +
                "<a href=\"" + row.borrarLink + "\" class=\" command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></a>";
        },
        "estado": function(column, row)
        {
            if(row.estado == 0) {
                return "<span class=\"label label-success\">Cancelado</span>";
            } else {
                return "<span class=\"label label-warning\">Pendiente</span>";
            }
        },
        "creador": function(column, row)
        {
            return '<strong>' + row.creador + '</strong> <br> <div class="italicTabla"><i>' + row.email + '</i></div> ';
        },
        "grupo": function(column, row)
        {
            return '<a href="' + row.grupoLink + '">' + row.grupo + '</a>';
        },
        "nombre": function (column, row) {
            return '<a href="' + row.ticketLink + '">'+ row.nombre +'</a>'
        },
        "total": function(column, row)
        {
            return '<strong class="text-menu">' + row.total + '</strong>';
        },
    }
}).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {

    }).end().find(".command-delete").on("click", function(e)
    {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
            title: 'Estas seguro?',
            text: "Esta boleta se eliminara permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then(function () {
            window.location.href = link;
        })
    });
});

var gridGroup = $("#table-groups").bootgrid({
    templates: {
        header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\">" +
        "<p class=\"{{css.search}}\"></p>" +
        "<button type=\"button\" class=\"btn btn-default actionPlus\" data-toggle=\"modal\" data-target=\"#modal-group\">" +
        "<span class=\"fa fa-plus-square\"></span>" +
        "</button>" +
        "</div></div></div>"
    },
    labels: {
        noResults: "No se econtraron resultados",
        search: "Buscar",
        infos: ""
    },
    multiSort: true,
    rowCount: [5, 15, 25, -1],
    navigation: 3,
    formatters: {
        "nombre": function (column, row) {
          return '<a href="' + row.nombreLink + '">'+ row.nombre +'</a>'
        },
        "acciones": function(column, row)
        {
            if( row.borrarLink == 0)
                return "<a href=\"" + row.nombreLink + "\" class=\" command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-bullseye\"></span></a> ";
            else
                return "<a href=\"" + row.nombreLink + "\" class=\" command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-bullseye\"></span></a> " +
                    "<a href=\"" + row.borrarLink + "\" class=\" command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></a>";
        },
        "creador": function(column, row)
        {
            return '<strong>' + row.creador + '</strong> <br> <div class="italicTabla"><i>' + row.email + '</i></div> ';
        },
        "total": function(column, row)
        {
            if(row.total == 0) {
                return '<strong class="text-green">' + row.total + ' <i class="fa fa-check"></i></strong> ';
            } else {
                return '<strong class="text-red">' + row.total + ' <i class="fa fa-remove"></i></strong> ';
            }
        },
    }
}).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    gridGroup.find(".command-edit").on("click", function(e)
    {

    }).end().find(".command-delete").on("click", function(e)
    {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
            title: 'Estas seguro?',
            text: "Este grupo se eliminara permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then(function () {
            window.location.href = link;
        })
    });
});