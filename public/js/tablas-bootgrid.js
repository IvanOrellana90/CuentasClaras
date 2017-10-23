/**
 * Created by FORECASTING on 23-10-2017.
 */

var grid = $("#table-ticket").bootgrid({
    templates: {
        header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\">" +
        "<p class=\"{{css.search}}\"></p>" +
        "<button type=\"button\" class=\"btn btn-default actionPlus\" data-toggle=\"modal\" data-target=\"#modal-default\">" +
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
    rowCount: -1,
    navigation: 1,
    formatters: {
        "acciones": function(column, row)
        {
            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                "<a href=\"" + row.borrarLink + "\" type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></a>";
        },
        "estado": function(column, row)
        {
            return "<span class=\"label label-warning\">Pendiente</span>";
        },
        "creador": function(column, row)
        {
            return '<strong>' + row.creador + '</strong> <br> <div class="italicTabla"><i>' + row.email + '</i></div> ';
        },
        "grupo": function(column, row)
        {
            return '<strong>' + row.grupo + '</strong>';
        }
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
        "<button type=\"button\" class=\"btn btn-default actionPlus\" data-toggle=\"modal\" data-target=\"#modal-default\">" +
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
    rowCount: -1,
    navigation: 1,
    formatters: {
        "acciones": function(column, row)
        {
            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                "<a href=\"" + row.borrarLink + "\" type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></a>";
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
