	jQuery(document).ready(function(){

	

	jQuery('#themeoptions_optin_form_code').change(change_selects);



	function str_replace (search, replace, subject, count) {

	var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,

				f = [].concat(search),

				r = [].concat(replace),

				s = subject,

				ra = r instanceof Array, sa = s instanceof Array;

		s = [].concat(s);

		if (count) {

			this.window[count] = 0;

		}

	 

		for (i=0, sl=s.length; i < sl; i++) {

			if (s[i] === '') {

				continue;

			}

			for (j=0, fl=f.length; j < fl; j++) {

				temp = s[i]+'';

				repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];

				s[i] = (temp).split(f[j]).join(repl);

				if (count && s[i] !== temp) {

					this.window[count] += (temp.length-s[i].length)/f[j].length;}

			}

		}

		return sa ? s : s[0];

	}	



	function change_selects(){

		var tags = ['a','iframe','frame','frameset','script'], reg, val = jQuery('#themeoptions_optin_form_code').val(),

			hdn = jQuery('#themeoptions_temp_optin_form_hidden_holder2'), formurl = jQuery('#themeoptions_optin_form_url'), hiddenfields = jQuery('#themeoptions_optin_form_hidden_fields');

	    formurl.val('');

		if(jQuery.trim(val) == '')

			return false;

		jQuery('#themeoptions_temp_optin_form_hidden_holder').html('');

		jQuery('#themeoptions_temp_optin_form_hidden_holder2').html('');

		/*var tmp = jQuery(val);

		tmp.find('a,iframe,frame,frameset,script,img').remove();

		tmp.find('input[type="image"]').attr('src','');*/

		for(var i=0;i<5;i++){

			reg = new RegExp('<'+tags[i]+'([^<>+]*[^\/])>.*?</'+tags[i]+'>', "gi");

			val = val.replace(reg,'');

			

			reg = new RegExp('<'+tags[i]+'([^<>+]*)>', "gi");

			val = val.replace(reg,'');

		}

		var tmpval;

		try {

			tmpval = decodeURIComponent(val);

		} catch(err){

			tmpval = val;

		}

		hdn.append(tmpval);

		/*alert(hdn.html());*/

		var num = 0;

		var name_selected = '';

		var email_selected = '';

		jQuery(':text',hdn).each(function(){

			var name = jQuery(this).attr('name'),

				//name_selected = name == $('#popup_domination_name_box_selected').val() ? ' selected="selected"' : '', 

				//email_selected = name == $('#popup_domination_email_box_selected').val() ? ' selected="selected"' : '';

				//jQuery('#popup_domination_name_box').append('<option value="'+name+'"'+name_selected+'>'+name+'</option>');

				//jQuery('#popup_domination_email_box').append('<option value="'+name+'"'+email_selected+'>'+name+'</option>');

				name_selected = num == '0' ? name : (num != '0' ? name_selected : ''), 

				email_selected = num == '1' ? name : email_selected;

				if(num=='0') jQuery('#themeoptions_optin_form_name').val(name_selected);

				if(num=='1') jQuery('#themeoptions_optin_form_email').val(email_selected);

		num++;

		});

		jQuery(':input[type=hidden]',hdn).each(function(){

			jQuery('#themeoptions_temp_optin_form_hidden_holder').append(jQuery('<input type="hidden" name="'+jQuery(this).attr('name')+'" />').val(jQuery(this).val()));

		});		

		var hidden_f = jQuery('#themeoptions_temp_optin_form_hidden_holder').html();

		formurl.val(jQuery('form',hdn).attr('action'));

		hidden_f = str_replace("&lt;", "<", hidden_f);

		hidden_f = str_replace("&gt;", ">", hidden_f);

		hiddenfields.val(hidden_f);

		//alert(tmpval);

		hdn.html('');

	};



});