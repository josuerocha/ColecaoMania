//$(document).ready(GerarGrafico(graf));
//function Trim(str){return str.replace(/^\s+|\s+$/g,"");}
function GerarGraficoUsuTopAno(ano)
{
    $.ajax({
        type: 'POST',
        url: '../class/UsuariosAtivosGraf.php',
        data: 'ano=' + ano,
        success: function (data)
        {
            var valores = eval(data);

            var mes1 = 0;
            var mes2 = 0;
            var mes3 = 0;
            var mes4 = 0;
            var mes5 = 0;
            var mes6 = 0;
            var mes7 = 0;
            var mes8 = 0;
            var mes9 = 0;
            var mes10 = 0;
            var mes11 = 0;
            var mes12 = 0;
            
   for (var i = 0; i < valores.length; i++)
            {
               // Trim(valores[i]['mes']);
               //alert(valores[3]['mes']);
                if (valores[i] == "undefined"){}else{
                    if (valores[i]['mes'] == 1)
                    {
                        mes1 = valores[i]['qtd']
                    } else
                    {
                        if (valores[i]['mes'] == 2)
                        {
                            mes2 = valores[i]['qtd']
                        } else
                        {
                            if (valores[i]['mes'] == 3)
                            {
                                mes3 = valores[i]['qtd']
                            } else
                            {
                                if (valores[i]['mes'] == 4)
                                {
                                    mes4 = valores[i]['qtd']
                                } else
                                {
                                    if (valores[i]['mes'] == 5)
                                    {
                                        mes5 = valores[i]['qtd']
                                    } else
                                    {
                                        if (valores[i]['mes'] == 6)
                                        {
                                            mes6 = valores[i]['qtd']
                                        } else
                                        {
                                            if (valores[i]['mes'] == 7)
                                            {
                                                mes7 = valores[i]['qtd']
                                            } else
                                            {
                                                if (valores[i]['mes'] == 8)
                                                {
                                                    mes8 = valores[i]['qtd']
                                                } else
                                                {
                                                    if (valores[i]['mes'] == 9)
                                                    {
                                                        mes9 = valores[i]['qtd']
                                                    } else
                                                    {
                                                        if (valores[i]['mes'] == 10)
                                                        {
                                                            mes10 = valores[i]['qtd']
                                                        } else
                                                        {
                                                            if (valores[i]['mes'] == 11)
                                                            {
                                                                mes11 = valores[i]['qtd']
                                                            } else
                                                            {
                                                                if (valores[i]['mes'] == 12)
                                                                {
                                                                    mes12 = valores[i]['qtd']
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
var e = [["Janeiro", mes1], ["Fevereiro", mes2], ["Março", mes3], ["Abril", mes4], ["Maio", mes5], ["Junho", mes6],["Julho", mes7], ["Agosto", mes8], ["Setembro", mes9], ["Outubro", mes10], ["Novembro", mes11], ["Dezembro", mes12]],
                    t = $.plot("#chart-bar-1", [{data: e, label: "Mês", color: "#1BA1E2"}],
                            {
                                legend: {show: !1}, xaxis: {mode: "categories", tickLength: 0}, yaxis: {show: !1},
                                series:
                                        {
                                            bars:
                                                    {
                                                        show: !0, barWidth: .6, fill: .8, align: "center"
                                                    }
                                        },
                                grid:
                                        {
                                            hoverable: !0, clickable: !0, backgroundColor: "transparent", borderWidth: 0
                                        }
                            }),
                    o = [];
            for (var u = 0; u < 20; ++u)
               - o.push([u, Math.sin(u)]);
            var a = [{data: o, label: "Pressure", color: "#FFFFFF"}],
                    f = [{color: "#F3F3F3", yaxis: {from: 1}}, {color: "#F3F3F3", yaxis: {to: -1}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 2, to: 2}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 8, to: 8}}];
            var d = function (e, t, n)
            {
                $("<div id='tooltip' class='flot-tooltip'>" + n + "</div>").css({top: t + 20, left: e - 50}).appendTo("body").fadeIn(200)
            };
            $("#chart-bar-1").bind("plothover", function (e, t, n) {
                var r = null;
                if (n) {
                    if (r != n.dataIndex) {
                        r = n.dataIndex
                        $("#tooltip").remove();
                        var i = n.datapoint[0],
                                s = n.series.data[i][0],
                                o = n.datapoint[1];
                        d(n.pageX, n.pageY, n.series.label + " de " + s + " = " + o)
                    }
                }
                else
                    $("#tooltip").remove(), r = null
            }), $(".syncronize .themes-choice > a, .unsyncronize .themes-navbar > a").on("click", function (o) {
                o.preventDefault();
                var u = $(this).attr("data-theme");
                $.each($(".widget"), function () {
                    var e = $(this), t = e.find(".widget-header"), n = e.find(".widget-action");
                    e.is('[class*="border-"]') && e.attr("class", "widget border-" + u), e.is('[class*="bg-"]') && e.attr("class", "widget bg-" + u), t.is('[class*="bg-"]') && t.attr("class", "widget-header bg-" + u), n.is('[class*="color-"]') && n.attr("class", "widget-action color-" + u)
                });
                var a = null;
                u == "lime" ? a = "#A4C400" : u == "green" ? a = "#60A917" : u == "emerald" ? a = "#008A00" : u == "teal" ? a = "#00ABA9" : u == "cyan" ? a = "#1BA1E2" : u == "cobalt" ? a = "#0050EF" : u == "indigo" ? a = "#6A00FF" : u == "violet" ? a = "#AA00FF" : u == "pink" ? a = "#F472D0" : u == "magenta" ? a = "#D80073" : u == "crimson" ? a = "#A20025" : u == "red" ? a = "#E51400" : u == "orange" ? a = "#FA6800" : u == "amber" ? a = "#F0A30A" : u == "yellow" ? a = "#E3C800" : u == "brown" ? a = "#825A2C" : u == "olive" ? a = "#6D8764" : u == "steel" ? a = "#647687" : u == "mauve" ? a = "#76608A" : u == "taupe" ? a = "#87794E" : a = "#323232", t.setData([{data: e, label: "Histogram", color: a}]), t.draw(), s.setData([{data: n, color: a, label: "FirstTime"}, {data: r, color: "#647687", label: "Return"}, {data: i, color: "#323232", label: "Purchase"}]), s.draw()
            })


        }
    });
    return false;
}	

function GerarGraficoTopAno(ano)
{
    $.ajax({
        type: 'POST',
        url: '../class/TopicosPorAnoGraf.php',
        data: 'ano=' + ano,
        success: function (data)
        {
            var valores = eval(data);

            var mes1 = 0;
            var mes2 = 0;
            var mes3 = 0;
            var mes4 = 0;
            var mes5 = 0;
            var mes6 = 0;
            var mes7 = 0;
            var mes8 = 0;
            var mes9 = 0;
            var mes10 = 0;
            var mes11 = 0;
            var mes12 = 0;
            
   for (var i = 0; i < valores.length; i++)
            {
               // Trim(valores[i]['mes']);
               //alert(valores[3]['mes']);
                if (valores[i] == "undefined"){}else{
                    if (valores[i]['mes'] == 1)
                    {
                        mes1 = valores[i]['qtd']
                    } else
                    {
                        if (valores[i]['mes'] == 2)
                        {
                            mes2 = valores[i]['qtd']
                        } else
                        {
                            if (valores[i]['mes'] == 3)
                            {
                                mes3 = valores[i]['qtd']
                            } else
                            {
                                if (valores[i]['mes'] == 4)
                                {
                                    mes4 = valores[i]['qtd']
                                } else
                                {
                                    if (valores[i]['mes'] == 5)
                                    {
                                        mes5 = valores[i]['qtd']
                                    } else
                                    {
                                        if (valores[i]['mes'] == 6)
                                        {
                                            mes6 = valores[i]['qtd']
                                        } else
                                        {
                                            if (valores[i]['mes'] == 7)
                                            {
                                                mes7 = valores[i]['qtd']
                                            } else
                                            {
                                                if (valores[i]['mes'] == 8)
                                                {
                                                    mes8 = valores[i]['qtd']
                                                } else
                                                {
                                                    if (valores[i]['mes'] == 9)
                                                    {
                                                        mes9 = valores[i]['qtd']
                                                    } else
                                                    {
                                                        if (valores[i]['mes'] == 10)
                                                        {
                                                            mes10 = valores[i]['qtd']
                                                        } else
                                                        {
                                                            if (valores[i]['mes'] == 11)
                                                            {
                                                                mes11 = valores[i]['qtd']
                                                            } else
                                                            {
                                                                if (valores[i]['mes'] == 12)
                                                                {
                                                                    mes12 = valores[i]['qtd']
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
var e = [["Janeiro", mes1], ["Fevereiro", mes2], ["Março", mes3], ["Abril", mes4], ["Maio", mes5], ["Junho", mes6],["Julho", mes7], ["Agosto", mes8], ["Setembro", mes9], ["Outubro", mes10], ["Novembro", mes11], ["Dezembro", mes12]],
                    t = $.plot("#chart-bar-1", [{data: e, label: "Mês", color: "#1BA1E2"}],
                            {
                                legend: {show: !1}, xaxis: {mode: "categories", tickLength: 0}, yaxis: {show: !1},
                                series:
                                        {
                                            bars:
                                                    {
                                                        show: !0, barWidth: .6, fill: .8, align: "center"
                                                    }
                                        },
                                grid:
                                        {
                                            hoverable: !0, clickable: !0, backgroundColor: "transparent", borderWidth: 0
                                        }
                            }),
                    o = [];
            for (var u = 0; u < 20; ++u)
               - o.push([u, Math.sin(u)]);
            var a = [{data: o, label: "Pressure", color: "#FFFFFF"}],
                    f = [{color: "#F3F3F3", yaxis: {from: 1}}, {color: "#F3F3F3", yaxis: {to: -1}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 2, to: 2}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 8, to: 8}}];
            var d = function (e, t, n)
            {
                $("<div id='tooltip' class='flot-tooltip'>" + n + "</div>").css({top: t + 20, left: e - 50}).appendTo("body").fadeIn(200)
            };
            $("#chart-bar-1").bind("plothover", function (e, t, n) {
                var r = null;
                if (n) {
                    if (r != n.dataIndex) {
                        r = n.dataIndex
                        $("#tooltip").remove();
                        var i = n.datapoint[0],
                                s = n.series.data[i][0],
                                o = n.datapoint[1];
                        d(n.pageX, n.pageY, n.series.label + " de " + s + " = " + o)
                    }
                }
                else
                    $("#tooltip").remove(), r = null
            }), $(".syncronize .themes-choice > a, .unsyncronize .themes-navbar > a").on("click", function (o) {
                o.preventDefault();
                var u = $(this).attr("data-theme");
                $.each($(".widget"), function () {
                    var e = $(this), t = e.find(".widget-header"), n = e.find(".widget-action");
                    e.is('[class*="border-"]') && e.attr("class", "widget border-" + u), e.is('[class*="bg-"]') && e.attr("class", "widget bg-" + u), t.is('[class*="bg-"]') && t.attr("class", "widget-header bg-" + u), n.is('[class*="color-"]') && n.attr("class", "widget-action color-" + u)
                });
                var a = null;
                u == "lime" ? a = "#A4C400" : u == "green" ? a = "#60A917" : u == "emerald" ? a = "#008A00" : u == "teal" ? a = "#00ABA9" : u == "cyan" ? a = "#1BA1E2" : u == "cobalt" ? a = "#0050EF" : u == "indigo" ? a = "#6A00FF" : u == "violet" ? a = "#AA00FF" : u == "pink" ? a = "#F472D0" : u == "magenta" ? a = "#D80073" : u == "crimson" ? a = "#A20025" : u == "red" ? a = "#E51400" : u == "orange" ? a = "#FA6800" : u == "amber" ? a = "#F0A30A" : u == "yellow" ? a = "#E3C800" : u == "brown" ? a = "#825A2C" : u == "olive" ? a = "#6D8764" : u == "steel" ? a = "#647687" : u == "mauve" ? a = "#76608A" : u == "taupe" ? a = "#87794E" : a = "#323232", t.setData([{data: e, label: "Histogram", color: a}]), t.draw(), s.setData([{data: n, color: a, label: "FirstTime"}, {data: r, color: "#647687", label: "Return"}, {data: i, color: "#323232", label: "Purchase"}]), s.draw()
            })


        }
    });
    return false;
}	

function GerarGraficoRespAno(ano)
{
    $.ajax({
        type: 'POST',
        url: '../class/RespostasPorAnoGraf.php',
        data: 'ano=' + ano,
        success: function (data)
        {
            var valores = eval(data);

            var mes1 = 0;
            var mes2 = 0;
            var mes3 = 0;
            var mes4 = 0;
            var mes5 = 0;
            var mes6 = 0;
            var mes7 = 0;
            var mes8 = 0;
            var mes9 = 0;
            var mes10 = 0;
            var mes11 = 0;
            var mes12 = 0;
            
   for (var i = 0; i < valores.length; i++)
            {
               // Trim(valores[i]['mes']);
               //alert(valores[3]['mes']);
                if (valores[i] == "undefined"){}else{
                    if (valores[i]['mes'] == 1)
                    {
                        mes1 = valores[i]['qtd']
                    } else
                    {
                        if (valores[i]['mes'] == 2)
                        {
                            mes2 = valores[i]['qtd']
                        } else
                        {
                            if (valores[i]['mes'] == 3)
                            {
                                mes3 = valores[i]['qtd']
                            } else
                            {
                                if (valores[i]['mes'] == 4)
                                {
                                    mes4 = valores[i]['qtd']
                                } else
                                {
                                    if (valores[i]['mes'] == 5)
                                    {
                                        mes5 = valores[i]['qtd']
                                    } else
                                    {
                                        if (valores[i]['mes'] == 6)
                                        {
                                            mes6 = valores[i]['qtd']
                                        } else
                                        {
                                            if (valores[i]['mes'] == 7)
                                            {
                                                mes7 = valores[i]['qtd']
                                            } else
                                            {
                                                if (valores[i]['mes'] == 8)
                                                {
                                                    mes8 = valores[i]['qtd']
                                                } else
                                                {
                                                    if (valores[i]['mes'] == 9)
                                                    {
                                                        mes9 = valores[i]['qtd']
                                                    } else
                                                    {
                                                        if (valores[i]['mes'] == 10)
                                                        {
                                                            mes10 = valores[i]['qtd']
                                                        } else
                                                        {
                                                            if (valores[i]['mes'] == 11)
                                                            {
                                                                mes11 = valores[i]['qtd']
                                                            } else
                                                            {
                                                                if (valores[i]['mes'] == 12)
                                                                {
                                                                    mes12 = valores[i]['qtd']
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
var e = [["Janeiro", mes1], ["Fevereiro", mes2], ["Março", mes3], ["Abril", mes4], ["Maio", mes5], ["Junho", mes6],["Julho", mes7], ["Agosto", mes8], ["Setembro", mes9], ["Outubro", mes10], ["Novembro", mes11], ["Dezembro", mes12]],
                    t = $.plot("#chart-bar-1", [{data: e, label: "Mês", color: "#1BA1E2"}],
                            {
                                legend: {show: !1}, xaxis: {mode: "categories", tickLength: 0}, yaxis: {show: !1},
                                series:
                                        {
                                            bars:
                                                    {
                                                        show: !0, barWidth: .6, fill: .8, align: "center"
                                                    }
                                        },
                                grid:
                                        {
                                            hoverable: !0, clickable: !0, backgroundColor: "transparent", borderWidth: 0
                                        }
                            }),
                    o = [];
            for (var u = 0; u < 20; ++u)
               - o.push([u, Math.sin(u)]);
            var a = [{data: o, label: "Pressure", color: "#FFFFFF"}],
                    f = [{color: "#F3F3F3", yaxis: {from: 1}}, {color: "#F3F3F3", yaxis: {to: -1}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 2, to: 2}},
                        {color: "#000", lineWidth: 1, xaxis: {from: 8, to: 8}}];
            var d = function (e, t, n)
            {
                $("<div id='tooltip' class='flot-tooltip'>" + n + "</div>").css({top: t + 20, left: e - 50}).appendTo("body").fadeIn(200)
            };
            $("#chart-bar-1").bind("plothover", function (e, t, n) {
                var r = null;
                if (n) {
                    if (r != n.dataIndex) {
                        r = n.dataIndex
                        $("#tooltip").remove();
                        var i = n.datapoint[0],
                                s = n.series.data[i][0],
                                o = n.datapoint[1];
                        d(n.pageX, n.pageY, n.series.label + " de " + s + " = " + o)
                    }
                }
                else
                    $("#tooltip").remove(), r = null
            }), $(".syncronize .themes-choice > a, .unsyncronize .themes-navbar > a").on("click", function (o) {
                o.preventDefault();
                var u = $(this).attr("data-theme");
                $.each($(".widget"), function () {
                    var e = $(this), t = e.find(".widget-header"), n = e.find(".widget-action");
                    e.is('[class*="border-"]') && e.attr("class", "widget border-" + u), e.is('[class*="bg-"]') && e.attr("class", "widget bg-" + u), t.is('[class*="bg-"]') && t.attr("class", "widget-header bg-" + u), n.is('[class*="color-"]') && n.attr("class", "widget-action color-" + u)
                });
                var a = null;
                u == "lime" ? a = "#A4C400" : u == "green" ? a = "#60A917" : u == "emerald" ? a = "#008A00" : u == "teal" ? a = "#00ABA9" : u == "cyan" ? a = "#1BA1E2" : u == "cobalt" ? a = "#0050EF" : u == "indigo" ? a = "#6A00FF" : u == "violet" ? a = "#AA00FF" : u == "pink" ? a = "#F472D0" : u == "magenta" ? a = "#D80073" : u == "crimson" ? a = "#A20025" : u == "red" ? a = "#E51400" : u == "orange" ? a = "#FA6800" : u == "amber" ? a = "#F0A30A" : u == "yellow" ? a = "#E3C800" : u == "brown" ? a = "#825A2C" : u == "olive" ? a = "#6D8764" : u == "steel" ? a = "#647687" : u == "mauve" ? a = "#76608A" : u == "taupe" ? a = "#87794E" : a = "#323232", t.setData([{data: e, label: "Histogram", color: a}]), t.draw(), s.setData([{data: n, color: a, label: "FirstTime"}, {data: r, color: "#647687", label: "Return"}, {data: i, color: "#323232", label: "Purchase"}]), s.draw()
            })


        }
    });
    return false;
}	