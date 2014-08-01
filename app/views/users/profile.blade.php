<?PHP 
	$schools = $targhetUser->school;
?>

@foreach($schools as $school)
{{$school->name}}
@endforeach