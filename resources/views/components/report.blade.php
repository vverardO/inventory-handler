<style>
	div{
		font-family: arial, sans-serif;	
		font-size: 18px;
	}
	h2{
		font-family: arial, sans-serif;	
	}
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
<title>Relatório {{$report->title}}</title>
<div>
	<div style="position: absolute; top:0; margin-top: 8px;">
		<img src="{{asset('assets/images/selos/avatar_big.png')}}" width='100' />
	</div>
	<div style="position: relative; top:0; margin-top: 8px;margin-left: 20%;text-align: center;font-size: 15px;">
		<h1>Relatório de Avaliação <br> {{$report->title}}</h1>
	</div>
</div>
<hr />
<div style='margin-bottom: 5px; margin-top:15px'><b>Escola Avaliada:</b> {{$report->avaliation->school->name}}<br></div>
<div style='margin-bottom: 5px;'><b>Responsável Legal/Diretor:</b> {{$report->avaliation->responsible}}<br></div>
<div style='margin-bottom: 20px;'><b>Horário de Funcionamento:</b> {{$report->avaliation->opening_hour_as_string}}<br></div>
</br>
<div style='margin-bottom: 5px;'><b>Data de Avaliação:</b> {{$report->avaliation->created_at_formatted}}<br></div>
<div style='margin-bottom: 5px;'><b>Avaliador:</b> {{$report->avaliation->user->name}}<br></div>
<div><b>Motivo da Avaliação:</b> {{$report->avaliation->reason}}<br></div><br>
<hr />
<h2 style='text-align: center;'>Tabela de Resultados - {{$report->initials}}</h2><hr />
<table style='margin-bottom: 10px;'>
	<thead>
		<tr>
			<th>Bloco</th>
			<th>TAD</th>
			<th>TIN</th>
			<th>Classificação</th>
		</tr>
	</thead>
	<tbody>
		@foreach($report->resultsTable as $result)
		<tr>
			<td>{{$result["title"]}}</td>
			<td>{{$result["suitable"]}}</td>
			<td>{{$result["unsuitable"]}}</td>
			<td>{{$result["classification"]}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<hr />
<table>
	<tr>		
		<th style='text-align: center;background-color: #dddddd;'><font size=15><strong>Resultado Total</font></th>		
		<th style='text-align: center;background-color: #dddddd;'><font size=15><strong>TAD: {{$report->total_suitable_percentage}}</font></th>
		<th style='text-align: center;background-color: #dddddd;'><font size=15><strong>TIN: {{$report->total_unsuitable_percentage}}</font></th>
	</tr>	
</table>
<hr />
<h2 style='text-align: center;'>Classificação {{$report->initials}}: {{$report->classification_as_string}}</h2><hr />