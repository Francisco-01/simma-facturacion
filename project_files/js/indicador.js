function GenerarIndicador()
{
	if( indicadores.length > 0 ) {
		var ind = indicadores.pop();
		if( ind.data.length == 0 ) {
			$("#indicador_" + ind.archivo ).html('<div class="alert alert-danger">No hay datos que mostrar</div>');
		}
		else
		{
			console.log(ind);
			ancho=parseInt( $("#"+ind.idpanel).width() * 0.95 );
			var canvas=$( '<canvas id="'+ind.idcanvas+'" width="' + ancho + '" height="400""></canvas>' );
			$("#"+ind.idpanel).html( '' );
			$("#"+ind.idpanel).append( canvas );
			var ctx = canvas.get(0).getContext( "2d" );
			var grafica=null;
			var etiquetas=new Array();
			var cantidades=new Array();
			var datos=null;
			if(ind.tipo.trim().toLowerCase()=="barras")
			{
				for(var idx in ind.data) if(!isNaN(idx))
				{
					etiquetas.push(EstandarizaString(ind.data[idx].Item));
					cantidades.push(parseFloat(ind.data[idx].Cantidad))
				}
				datos={
					labels: etiquetas,
					datasets: [{
						label: "Estadísticos",
						fillColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",0.2)",
						strokeColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						pointColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						data: cantidades
					}]
				};
				var grafica = new Chart(ctx).Bar(datos,{
					options: {
						responsive: true,
					    scales: {
					        yAxes: [{
					            ticks: {
					                beginAtZero:true
					            }
					        }]
					    }
					}
				});
			}
			else if(ind.tipo.trim().toLowerCase()=="line")
			{
				for(var idx in ind.data) if(!isNaN(idx))
				{
					etiquetas.push(EstandarizaString(ind.data[idx].Item));
					cantidades.push(parseFloat(ind.data[idx].Cantidad));
				}
				datos={
					labels: etiquetas,
					datasets: [{
						label: "Estadísticos",
						fillColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",0.2)",
						strokeColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						pointColor: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
						data: cantidades
					}]
				};
				console.log( datos, "#indicador_" + ind.archivo, "#" + ind.idpanel )
				var grafica = new Chart(ctx).Line(datos,{
					options: {
						responsive: true,
					    scales: {
					        yAxes: [{
					            ticks: {
					                beginAtZero:true
					            }
					        }]
					    }
					}
				});
			}
			else if(ind.tipo.trim().toLowerCase()=="pie")
			{
				datos=new Array();
				for(var idx in ind.data) if(!isNaN(idx))
				{
					datos.push({
						value: parseFloat(ind.data[idx].Cantidad),
					    color:"rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
					    highlight: "rgba("+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+","+aleatorioEntre(75,150)+",1)",
					    label: EstandarizaString(ind.data[idx].Item)
					});
				}
				var grafica = new Chart(ctx).Pie(datos,{responsive: true});
			}
		}
		GenerarIndicador();
	}
}