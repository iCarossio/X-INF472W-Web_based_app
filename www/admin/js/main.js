jQuery(function(){


	// Stick the footer down
	var docHeight = $(window).height();
	var footerHeight = $('#footer').height();
	var footerTop = $('#footer').position().top + footerHeight;

	if (footerTop < docHeight) {
	    $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
	}


	var modified = new Map();

	$('textarea').focusin(function(){
		if (this.parentNode.id>0){ // Vérifier qu'on n'est pas dans la case "ajouter"
			var key = this.name + this.parentNode.id;
			if (!(modified.has(key))){ // Si la case n'est pas déjà modifiée
				modified.set(key, new Array(this.parentNode.id , this.name)) // Ajoute les coordonnées de la case modifiée
			}; 
		}

		console.log(modified);
	});


	$('#update').click(function(event) {
		event.preventDefault();

	    var table_name = this.name;

	    modified.forEach(function(item, key, map){

	    	var curr = $("#"+item[0]+" [name='"+item[1]+"']"); // Récupère le contenu de la variable modifiée

	    	console.log(curr);

		  	$.ajax({
	       		url : 'update.php',
	       		type : 'POST', 
	       		data : 'id=' + item[0] + '&field=' + item[1] + '&value=' + curr.val() + '&table=' + table_name, // On fait passer nos variables
	       		dataType : 'html',

	       		success : function(code_html, statut){ // code_html contient le HTML renvoyé
	       			console.log(code_html);
	       			if (code_html=="success"){
	       				$.notify("Database sucessfully updated", "success");
	       			} else{
	       				$.notify("Update failure", "error");
	       			}

	       		},
	       		error : function(resultat, statut, erreur){ // en cas d'erreur
	       			$.notify("Update failure", "error");
	       		}
			});

		});

	});

	$('[id^=uploadfile]').on('submit',(function(e) {

		e.preventDefault();

		var currLogoId = '#logo'+this.id.value;
		console.log(currLogoId);
		console.log(location.href);

		$.ajax({
			url: "upload_file.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success : function(code_html, statut){ // code_html contient le HTML renvoyé

	       			if (code_html=="success"){
	       				$.notify("Image successfully uploaded", "success");
	       				$(currLogoId).load(location.href+ " "+ currLogoId);
	       			} else{
	       				$.notify(code_html, "error");
	       			}

	       	},
	       	error : function(resultat, statut, erreur){ // en cas d'erreur
	       			$.notify(code_html, "error");
	       		}
			
		});
	}));


	$('[id^=delete]').click(function(event) {
			event.preventDefault();

			var currId = this.id.match(/\d+/);

			$("#card"+currId).fadeOut(600);

			$.ajax({
	       		url : 'delete.php',
	       		type : 'POST', 
	       		data : 'id=' + currId + '&table=' + this.name, // On fait passer nos variables
	       		dataType : 'html',

	       		success : function(code_html, statut){ // code_html contient le HTML renvoyé
	       			console.log(code_html);
	       			if (code_html=="success"){
	       				$.notify("Sucessfully deleted", "success");
	       			} else{
	       				$.notify("Deletion failure", "error");
	       			}

	       		},
	       		error : function(resultat, statut, erreur){ // en cas d'erreur
	       			$.notify("Deletion failure", "error");
	       		}
			});

	});

	$('#add').click(function(event) {
		event.preventDefault();

		var data = "table=" + this.name;

		$("#-1 textarea").each(function(){
			data += "&";
			data += this.name;
			data += "=";
			data += $(this).val();
			$(this).val('');
		});

		console.log(data);

		$.ajax({
       		url : 'add.php',
       		type : 'POST', 
       		data : data, // On fait passer nos variables
       		dataType : 'html',

       		success : function(code_html, statut){ // code_html contient le HTML renvoyé
       			console.log(code_html);
       			if (code_html=="success"){
       				location.reload();
       			} else{
       				$.notify("Update failure", "error");
       			}

       		},
       		error : function(resultat, statut, erreur){ // en cas d'erreur
       			$.notify("Update failure", "error");
       		}
		});

	});



	$('[id^=suppruser]').click(function(event) { //envoie l'instruction de supprimer un utilisateur
		event.preventDefault();

		
		var name = this.parentNode.id;

		console.log(name);

		if(confirm("Etes-vous certain de vouloir supprimer l'utilisateur : "+name+"?")){
				$.ajax({
		       		url : 'suppruser.php',
		       		type : 'POST', 
		       		data : "name="+name, // On fait passer nos variables
		       		dataType : 'html',

		       		success : function(code_html, statut){ // code_html contient le HTML renvoyé
		       			console.log(code_html);
		       				$('#'+name).fadeOut();
		       				$.notify("Utilisateur supprimé!", "success");

		       		},
		       		error : function(resultat, statut, erreur){ // en cas d'erreur
		       			$.notify("Echec de la suppression", "error");
		       		}
				});

		}


	});


});