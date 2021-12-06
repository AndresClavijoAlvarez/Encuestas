jQuery.noConflict();

function recargar()
{
	window.top.location.href='index.php';
}

function insertHTML(t)
{
	(function($)
	{
		$("#result").html(t);
	})(jQuery);	
}

// Envío solicitud
function sfa(nForm, url, cbf)
{	
	(function($)
	{
		jQuery.ajax
		({
			url: url,
			data: $(nForm).serialize(),
			type: 'POST',
			
			beforeSend: function(t)
			{
			},
			
			success: function(t)
			{
				if (cbf != "")
					window[cbf](t);
			},
			
			error: function(xhr, txtStatus, error)
			{
				alert("Hubo un error enviando la solicitud. Por favor, intente nuevamente");
			}
		});
	})(jQuery);
}

jQuery(document).ready(function($)
{
	var dates = $("#date_init, #date_end").datepicker(
	{
		firstDay: 1,
		dateFormat: 'yy-mm-dd',
		monthNames: ['Enero','Febrero','Marzo','Abril',
					'Mayo','Junio','Julio','Agosto','Septiembre',
					'Octubre','Noviembre','Deciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul',
						'Ago','Sep','Oct','Nov','Dec'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles','Jueves', 'Viernes', 'S&aacute;bado'],
		dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onSelect: function( selectedDate )
		{
			var option = this.id == "date_init" ? "minDate" : "maxDate",
			instance = $( this ).data( "datepicker" ),
			date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
			dates.not(this).datepicker("option", option, date);
		}
	});
	
	$(".config-seo").live("click", function()
	{
		$(".config-seo div.ui-icon").toggleClass("ui-icon-triangle-1-e");
		$(".config-seo div.ui-icon").toggleClass("ui-icon-triangle-1-s");
		$(".config-seo-box").slideToggle(300);
	});
	
	$("#send").click(function()
	{
		$("#chart").html("");
		$("#result").html("");
		sfa("#frmQuery", "queryData.php", "insertHTML");
	});
	
	$("#main_registrado").submit(function()
	{
		var retorno = false;
		
		jQuery.ajax(
		{
			async: false,
			url: 'queryClients.php',
			data: $(this).serialize(),
			dataType: 'json',
			type: 'POST',
			
			beforeSend: function(t)
			{
			},
			
			success: function(t)
			{
				if (t.exist == "0")
				{
					$.jGrowl("Este usuario no se encuentra registrado en el sistema. Por favor reg&iacute;strese o ingrese nuevamente su c&oacute;digo.", {header: 'Error', life: 10000});
					retorno = false;
				}
				else
				{
					retorno = true;
				}
			},
			
			error: function(xhr, txtStatus, error)
			{
				alert("Hubo un error enviando la solicitud. Por favor, intente nuevamente");
				retorno = false;
			}
		});
		
		return retorno;
	});
	
	$("#encuesta").submit(function()
	{
		var retorno = false;
		
		jQuery.ajax(
		{
			async: false,
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			type: 'POST',
			
			beforeSend: function(t)
			{
			},
			
			success: function(t)
			{
				if (t.errors == "1")
				{
					$.jGrowl(t.message, {header: 'Error', life: 10000});
					retorno = false;
				}
				else
				{
					$.jGrowl.defaults.position = 'center';
					$.jGrowl("<br />La encuesta se ha guardado con &eacute;xito. La aplicaci&oacute;n se actualizar&aacute; en unos momentos. <br /><br /><center><a href='#' class='colorln' onclick='window.top.location.href=\"index.php\";'>Regresar</a></center>", {header: '', life: 10000, position: 'center'});
					setTimeout("recargar()", 10000);
					retorno = false;
				}
			},
			
			error: function(xhr, txtStatus, error)
			{
				alert("Hubo un error enviando la solicitud. Por favor, intente nuevamente: " + error);
				retorno = false;
			}
		});
		
		return retorno;
	});
});