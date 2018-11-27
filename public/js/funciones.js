function input_numerico(id,valor)
{            
	var letraN = '';
	var arreglo = '0123456789';
	for (var i=0;i<valor.length;i++)
	{
		if (arreglo.indexOf(valor.substr(i,1)) != -1)
		{
			letraN = letraN + valor.substr(i,1);
		}                
	}
	if(valor != letraN) {
		valor = letraN;
	}          
        $('#'+id).val(valor);
}
$('.numerico').keyup(function(){
    input_numerico($(this).attr('id'),$(this).val()); 
});