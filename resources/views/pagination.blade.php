<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>제목</th>
				<th>내용</th>
			</tr>
		</thead>
		<tbody>			
			@foreach ($data['posts'] as $list)
			<tr>
				<td>{{ $list->title }}</td>		
				<td>{{ $list->content }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($data['posts'] as $number)
		<a href="#">{{ $data['pageCount'] }}</a>
	@endforeach
</body>
</html>