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
			{{-- @foreach ($data['posts'] as $list)
			<tr>
				<td>{{ $list->title }}</td>		
				<td>{{ $list->content }}</td>
			</tr>
			@endforeach	 --}}
			
			@foreach ($page as $list) 
			<tr>
				<td>{{ $list->title }}</td>		
				<td>{{ $list->content }}</td>
			</tr>
			@endforeach			

		</tbody>
		

	</table>
		@if($pageOffset<$totalPage)
		{{-- <a href="/page?page={{ 1 }}">처음</a>
			@for($i = 1; $i<=$pageOffset; $i++)
				@if ($i == $currentPage)
					<span>{{ $i }}</span>
				@else
					<a href="/page?page={{ $i }}">{{ $i }}</a>
				@endif
			@endfor
			<a href="/page?page={{ $pageOffset+1 }}">다음</a>

		@elseif($pageOffset<6)
			@for($i=$pageOffset; $i<=$totalPage; $i++)
				@if ($i == $currentPage)
					<span>{{ $i }}</span>
				@else
					<a href="/page?page={{ $i }}">{{ $i }}</a>
				@endif
			@endfor --}}

		@else
			@for($i = 1; $i<=$totalPage; $i++)
				@if ($i == $currentPage)
					<span>{{ $i }}</span>
				@else
					<a href="/page?page={{ $i }}">{{ $i }}</a>
				@endif
			@endfor
		@endif
		
		{{-- ///////////////////////////// --}}
			@for($i = 1; $i<=$totalPage; $i++)
				@if ($i == $currentPage)
					<span>{{ $i }}</span>
				@else
					<a href="/page?page={{ $i }}">{{ $i }}</a>
				@endif
			@endfor

</body>
</html>