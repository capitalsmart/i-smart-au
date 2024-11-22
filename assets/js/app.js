/* 
 * @author: Innam Hunzai <innam@techarete.com>
 * @project: Car Parts SVG Tool 
 * @version: 1.0 beta
 */

function userMark(cx, cy, markerId) {
    this.cx = cx;
    this.cy = cy;
    this.markerId = markerId;
}

function carApp(toolbar)
{
    this.canvas = {
        width: 0,
        height: 0
    }
    this.userMarks = [];
    this.scalefactor = 0;
    this.toolbar = toolbar;
    this.selectedPart = null;
    this.centered;
    this.active = d3.select(null);
    this.path = null;
    this.svg = null;
    this.g = null;

    var carapp = this;
    this.init = function (divElementId, svgUrl) {
        $.get(svgUrl, function (svg) {
            $("#" + divElementId).append(svg);
            carapp.canvas.width = $("#svg-car").width();
            carapp.canvas.height = $("#svg-car").height();
            var projection = d3.geoAlbersUsa()
                    .translate([carapp.canvas.width / 2, carapp.canvas.height / 2]);
            carapp.path = d3.geoPath()
                    .projection(projection);
            carapp.svg = d3.select("#svg-car");
            carapp.g = d3.select("#main-g");

            d3.selectAll("path.selectable").on("click", carapp.clicked);
            d3.selectAll("path.freezline").on("click", carapp.reset);
            carapp.scalefactor = carapp.calculateScalingFactor();
        }, 'text');
        return carapp;
    }

    this.clicked = function (d) {
        if (carapp.toolbar.currentOption !== false && carapp.active.node() === this) {
            carapp.placeMarker(this);
            return;
        }
        if (carapp.active.node() === this)
            return carapp.reset();
        carapp.active.classed("active", false);
        carapp.active = d3.select(this).classed("active", true);

        a = this.getBBox();
        dx = a.width;
        dy = a.height;
        x = a.x;
        y = a.y;

        scale = carapp.scalefactor / Math.max(dx / carapp.canvas.width, dy / carapp.canvas.height);
        translate = [carapp.canvas.width / 2 - scale * x, carapp.canvas.height / 2 - scale * y];

        carapp.g.transition()
                .duration(750)
                .attr("transform", "translate(" + translate + ") scale(" + scale + ")");
        carapp.toolbar.show();
    }

    this.placeMarker = function (node) {
        cx = d3.mouse(node)[0];
        cy = d3.mouse(node)[1];
        usermarker = new userMark(cx, cy, carapp.toolbar.getCurrentOptionKey());
        drawMarker(usermarker);
    }

    function drawMarker(userMarker) {
        var m = d3.select("#dynamic-elements").append("g")
                .attr("transform", "translate("+(userMarker.cx - 175) +", " + (userMarker.cy-175)+ ") scale("+carapp.toolbar.items[userMarker.markerId].scale+")")
                .attr("class", "usermarker draggable")
                .attr("id", "usermarker-" + userMarker.markerId)
                .call(d3.drag()
                        .on("start", carapp.dragstarted)
                        .on("drag", carapp.dragged)
                        .on("end", carapp.dragended));
        m.append("path")
                .attr("opacity","0")
                .attr("fill", "#000000")
                .attr("stroke","none")
                .attr("d", carapp.toolbar.items[userMarker.markerId].boundingElementData);
        for (var index in carapp.toolbar.items[userMarker.markerId].data) {
             m.append("path")
                     .attr("d", carapp.toolbar.items[userMarker.markerId].data[index])
                     .attr("style", "fill:"+carapp.toolbar.items[userMarker.markerId].color+";stroke:none");
        }
    }

    this.reset = function () {
        carapp.active.classed("active", false);
        $("#delete-image").hide();
        carapp.active = d3.select(null);
        carapp.g.transition()
                .attr("transform", "scale(0.1,0.1)");
        carapp.toolbar.hide();
        carapp.toolbar.currentOption = false;
    }

    this.dragmove = function (d) {
        var x = d3.event.x;
        var y = d3.event.y;
        var transform = d3.select(this).attr("transform").split(" ");
        d3.select(this).attr("transform", "translate(" + (x - 175) + ", " + (y - 175) + ") "+transform[2]);
    }

    this.dragstarted = function (d) {
        d3.select(this).raise().classed("draging", true);
        $("#delete-image").show();
    }

    this.dragged = function (d) {
        //d3.select(this).attr("x", d3.event.x - 175).attr("y", d3.event.y - 175);
        var transform = d3.select(this).attr("transform").split(" ");
        d3.select(this).attr("transform", "translate(" + (d3.event.x - 175) + ", " + (d3.event.y-175) + ") "+transform[2]);
    }

    this.dragended = function (d) {
        d3.select(this).classed("draging", false);
        deleteIconBox = document.getElementById("delete-image").getBBox();
        point = d3.mouse(document.getElementById("delete-image"));

        if (deleteIconBox.x <= point[0] && deleteIconBox.x + deleteIconBox.width >= point[0] && deleteIconBox.y <= point[1] && deleteIconBox.y + deleteIconBox.height >= point[1]) {
            $(this).remove();
        }
        $("#delete-image").hide();
    }

    this.calculateScalingFactor = function () {
        var envs = {xs: 5, sm: 2, md: 2, lg: 2};

        var $el = $('<div>');
        $el.appendTo($('body'));

        for (var env in envs) {
            $el.addClass('hidden-' + env);
            if ($el.is(':hidden')) {
                $el.remove();
                return envs[env];
            }
        }
    }

    this.exportToJSON = function () {
        userMarks = [];
        d3.selectAll('.usermarker').each(function() {
            userMarks.push(new userMark(d3.select(this).attr('cx'), d3.select(this).attr('cy'), d3.select(this).attr('id').replace("usermarker-","")));
        });
        
        return userMarks.length == 0 ? false : JSON.stringify(userMarks);
    }
    
    this.importFromJSON = function(jsonString) {
        carapp.clearDrawing();
        userMarks = JSON.parse(jsonString);
        for (i=0; i < userMarks.length; i++) {
            drawMarker(userMarks[i]);
        } 
    }

    this.clearDrawing = function (){
        $('.usermarker').each(function() {
           $(this).remove();            
        });
    }
}



        