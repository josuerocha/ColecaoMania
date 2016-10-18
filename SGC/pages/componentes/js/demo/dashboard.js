$(function ()
{
    var hora = $('input[name="hora"]').val();
    var foto = $('input[name="foto"]').val();
    var nome = $('input[name="nome"]').val();
    var codigo = $('input[name="idUsuRecebe"]').val();
    var texto = $('input[name="chat-text"]').val();

    $("#chat").mCustomScrollbar("scrollTo", "bottom"),
            $('[data-toggle="add-others"]').click(function () {
        $(".add-to-chat").slideToggle("fast", "easeOutBack")
    }),
            $('[name="addtochat"]').select2({placeholder: "Select user to add"}),
            $("#form-chat").submit(function () {

       $.ajax({
            type: 'POST',
            url: 'salva.php',
            data: 'idUsuRecebe=' + codigo + '&chat-text=' + texto,
            dataType: bool,
            success: function (data) {
                alert('Salvo');
            },
            error: function (data) {
                alert('Erro');
            }
        });

        var e = $('input[name="chat-text"]').val(),
                t = '<li class="other"><div class="avatar">    <img src="' + foto + '" alt="" title="me" /></div><div class="messages">    <p>' + e + "</p>" + '    <time datetime= "">' + nome + " | " + hora + '</time>' + "</div>" + "</li>";
        return e != "" && e != " " && ($("ol.chats").append(t),
                $("#chat").mCustomScrollbar("update"),
                $("#chat").mCustomScrollbar("scrollTo", "bottom"),
                $('input[name="chat-text"]').val("")), !1
    }),
            $("#form-addtochat").submit(function () {
        var e = $('[name="addtochat"]').select2("val");
        return e.length > 0 && $.each(e, function (e, t) {
            var n = '<li class="moderator"><div class="messages"><p>' + t + " now join to chat</p></div>" + "</li>";
            $('[name="addtochat"] option[value="' + t + '"]').remove(),
                    $('[name="addtochat"]').select2({placeholder: "Select user to add"}),
                    $("ol.chats").append(n), $("#chat").mCustomScrollbar("update"),
                    $("#chat").mCustomScrollbar("scrollTo", "bottom")
        }),
                $(".add-to-chat").slideToggle("fast", "easeOutBack"), !1
    }),
            $("#post-content").wysihtml5(), $('[data-form="select2"]').select2(),
            $("#post-tags").select2({tags: ["print", "webs", "icons", "graphics", "vectors", "bussiness", "others"]}),
            $(".syncronize .themes-choice > a, .unsyncronize .themes-navbar > a").on("click",
            function (e) {
                e.preventDefault();
                var t = $(this).attr("data-theme");
                $.each($(".widget"),
                        function () {
                            var e = $(this),
                                    n = e.find(".widget-header"),
                                    r = e.find(".widget-action");
                            e.is('[class*="border-"]') && e.attr("class", "widget border-" + t),
                                    e.is('[class*="bg-"]') && e.attr("class", "widget bg-" + t),
                                    n.is('[class*="bg-"]') && n.attr("class", "widget-header bg-" + t),
                                    r.is('[class*="color-"]') && r.attr("class", "widget-action color-" + t)
                        }),
                        $(".chat-action form").find(".btn").attr("class", "btn bg-" + t),
                        $(".overview-today .overview-count").attr("class", "overview-count color-" + t);
                var r = null;
                t == "lime" ? r = "#A4C400" : t == "green" ? r = "#60A917" : t == "emerald" ? r = "#008A00" : t == "teal" ? r = "#00ABA9" : t == "cyan" ? r = "#1BA1E2" : t == "cobalt" ? r = "#0050EF" : t == "indigo" ? r = "#6A00FF" : t == "violet" ? r = "#AA00FF" : t == "pink" ? r = "#F472D0" : t == "crimson" ? r = "#A20025" : t == "red" ? r = "#E51400" : t == "orange" ? r = "#FA6800" : t == "amber" ? r = "#F0A30A" : t == "yellow" ? r = "#E3C800" : t == "brown" ? r = "#825A2C" : t == "olive" ? r = "#6D8764" : t == "steel" ? r = "#647687" : t == "mauve" ? r = "#76608A" : t == "taupe" ? r = "#87794E" : r = "#323232", $("#stats-chart").empty(), n(r),
                        $(window).resize(function () {
                    $("#stats-chart").empty(), n(r)
                })
            });
});

       