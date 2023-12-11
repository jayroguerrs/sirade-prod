"use strict";var dbGeneral=function(){var e={self:null,rendered:!1};return{init:function(){!function(){let e=new FormData;e.append("registro","genero"),fetch("includes/modelo-dashboard-general.php",{method:"POST",body:e}).then((e=>e.json())).then((e=>{if("ok"==e.resultado){document.querySelector("#lblTotalAlumni").innerHTML=parseInt(e.todos).toLocaleString("en");var t={series:[parseInt(e.masculino),parseInt(e.femenino)],chart:{fontFamily:"inherit",width:310,type:"pie"},labels:["Hombres","Mujeres"],responsive:[{breakpoint:480,options:{chart:{width:100},legend:{position:"bottom"}}}]};new ApexCharts(document.querySelector("#ch_genero"),t).render()}}))}(),function(){var t=document.getElementById("ch_talumnianual");if(t){var o=parseInt(KTUtil.css(t,"height")),r=KTUtil.getCssVariableValue("--kt-gray-500"),a=KTUtil.getCssVariableValue("--kt-border-dashed-color"),s=KTUtil.getCssVariableValue("--kt-success"),i=(KTUtil.getCssVariableValue("--kt-success"),KTUtil.getCssVariableValue("--kt-primary"),{series:[{name:"Magisters",data:[27,83,219,236,186,219,201,289,307,936,817,461,1233,730,743,1016,564,458,0,500]},{name:"Doctores",data:[0,0,0,0,0,0,0,0,0,7,8,0,0,9,0,8,0,0,0,0]}],chart:{fontFamily:"inherit",type:"area",height:o,toolbar:{show:!1}},plotOptions:{},legend:{position:"top",horizontalAlign:"right",floating:!0},colors:[s,"#F1416C"],dataLabels:{enabled:!1},fill:{type:"gradient",gradient:{shadeIntensity:1,opacityFrom:.4,opacityTo:0,stops:[0,80,100]}},stroke:{curve:"smooth",show:!0,width:3,colors:[s,"#F1416C"]},xaxis:{categories:["2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021"],axisBorder:{show:!1},axisTicks:{show:!1},tickAmount:6,labels:{rotate:0,rotateAlways:!0,style:{colors:r,fontSize:"12px"}},crosshairs:{position:"front",stroke:{color:[s,"#F1416C"],width:1,dashArray:3}},tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}},yaxis:{tickAmount:4,max:1500,min:10,labels:{style:{colors:r,fontSize:"12px"},formatter:function(e){return e}}},states:{normal:{filter:{type:"none",value:0}},hover:{filter:{type:"none",value:0}},active:{allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}}},tooltip:{style:{fontSize:"12px"},y:{formatter:function(e){return e}}},grid:{borderColor:a,strokeDashArray:4,yaxis:{lines:{show:!0}}},markers:{strokeColor:s,strokeWidth:3}});e.self=new ApexCharts(t,i),setTimeout((function(){e.self.render(),e.rendered=!0}),200)}}(),function(){var e={self:null,rendered:!1},t=document.getElementById("ch_generoanual");if(t){t.hasAttribute("data-kt-negative-color")?t.getAttribute("data-kt-negative-color"):KTUtil.getCssVariableValue("--kt-success");var o=parseInt(KTUtil.css(t,"height")),r=KTUtil.getCssVariableValue("--kt-gray-500"),a=KTUtil.getCssVariableValue("--kt-border-dashed-color"),s={series:[{name:"Hombres",data:[19,60,165,177,132,143,137,194,230,665,583,335,871,508,520,674,371,294,0,327]},{name:"Mujeres",data:[8,23,54,59,54,76,64,95,77,271,234,126,362,222,223,342,193,164,0,173]}],chart:{fontFamily:"inherit",type:"bar",stacked:!0,height:o,toolbar:{show:!1}},plotOptions:{bar:{columnWidth:"35%",barHeight:"70%",borderRadius:[6,6]}},legend:{show:!1},dataLabels:{enabled:!1},xaxis:{categories:["2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021"],axisBorder:{show:!1},axisTicks:{show:!1},tickAmount:10,labels:{style:{colors:[r],fontSize:"12px"}},crosshairs:{show:!1}},yaxis:{min:10,max:1400,tickAmount:6,labels:{style:{colors:[r],fontSize:"12px"},formatter:function(e){return parseInt(e)}}},fill:{opacity:1},states:{normal:{filter:{type:"none",value:0}},hover:{filter:{type:"none",value:0}},active:{allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}}},tooltip:{style:{fontSize:"12px",borderRadius:4},y:{formatter:function(e){return e>0?e:Math.abs(e)}}},colors:[KTUtil.getCssVariableValue("--kt-primary"),"#F1416C"],grid:{borderColor:a,strokeDashArray:4,yaxis:{lines:{show:!0}}}};e.self=new ApexCharts(t,s),setTimeout((function(){e.self.render(),e.rendered=!0}),200)}}(),function(){var e={self:null,rendered:!1},t=document.getElementById("ch_region");if(t){var o=KTUtil.getCssVariableValue("--kt-border-dashed-color"),r={series:[{data:[6401,384,234,220,183,162,138],show:!1}],chart:{type:"bar",height:350,toolbar:{show:!1}},plotOptions:{bar:{borderRadius:4,horizontal:!0,distributed:!0,barHeight:23}},dataLabels:{enabled:!0,textAnchor:"start",offsetX:20,style:{fontSize:"12px",fontWeight:"600",align:"left",fontWeight:"bold",colors:["#304758"]}},legend:{show:!1},colors:["#3E97FF","#F1416C","#50CD89","#FFC700","#7239EA","#50CDCD","#3F4254"],xaxis:{categories:["Lima","Arequipa","Cusco","La Libertad","Piura","Lambayeque","Junín"],labels:{formatter:function(e){return e},style:{colors:KTUtil.getCssVariableValue("--kt-gray-400"),fontSize:"14px",fontWeight:"600",align:"left"}},axisBorder:{show:!1}},yaxis:{labels:{style:{colors:KTUtil.getCssVariableValue("--kt-gray-800"),fontSize:"14px",fontWeight:"600"},offsetY:2,align:"left"}},grid:{borderColor:o,xaxis:{lines:{show:!0}},yaxis:{lines:{show:!1}},strokeDashArray:4}};e.self=new ApexCharts(t,r),setTimeout((function(){e.self.render(),e.rendered=!0}),200)}}()}}}();KTUtil.onDOMContentLoaded((function(){dbGeneral.init()}));