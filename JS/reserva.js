$(document).ready(function(){
	$('#funcion-select').change(function(){
		var funcionId = $(this).val();
		if(funcionId){
			$.ajax({
				type:'POST',
				url:'getAsientos.php',
				data:'Id_Funcion='+funcionId,
				success:function(html){
					$('#asiento-select').html(html);
					$('#asiento-select').prop('disabled', false);
				}
			}); 
		}else{
			$('#asiento-select').html('<option value="">--Seleccione un asiento--</option>');
			$('#asiento-select').prop('disabled', true);
		}
	});

	$('#reserva-form').submit(function(){
		var funcionId = $('#funcion-select').val();
		var asientoId = $('#asiento-select').val();
		if(funcionId && asientoId){
			$.ajax({
				type:'POST',
				url:'guardarReserva.php',
				data:'Id_Funcion='+funcionId+'&Id_Asiento='+asientoId,
				success:function(html){
					$('#mensaje').html(html);
					$('#asiento-select').prop('disabled', true);
					$('#funcion-select').val('');
					$('#asiento-select').html('<option value="">--Seleccione un asiento--</option>');
				}
			});
		}else{
			$('#mensaje').html('<p style="color:red;">Debe seleccionar una función y un asiento.</p>');
		}
		return false;
	});
});
