	<h1><?= $translator->getTranslation("Catégories de l'utilisateur") ?></h1>

<table class="actionsTable">
<tr>
<td>
<div id="categoryList">
</div>
</td>
<td style="vertical-align: top;">
<div id="categoryModification">
Sélectionnez une action ou une catégorie...
</div>
</td>
</tr>
</table>

<h1><?= $translator->getTranslation("Catégories du couple") ?></h1>

<table class="actionsTable">
<tr>
<td>
<div id="categoryDuoList">
</div>
</td>
<td style="vertical-align: top;">
<div id="categoryDuoModification">
Sélectionnez une action ou une catégorie...
</div>
</td>
</tr>
</table>

<script type="text/javascript">
listCategories();
listCategoriesDuo();

function listCategories()
{
	$.ajax({
	    type : 'POST',
	    url : 'page.php',
	    data: {
	        'page': 'administration_category_list', 
	        'area': 'administration',
	        'data': 'USER'
	    },
	    dataType: 'html',
	    success : function(data) {
	        $('#categoryList').html(data);
	        changeForm(document.getElementById("accountsList"));
	    }
	});
}

function listCategoriesDuo()
{
	$.ajax({
	    type : 'POST',
	    url : 'page.php',
	    data: {
	        'page': 'administration_category_list', 
	        'area': 'administration',
	        'data': 'DUO'
	    },
	    dataType: 'html',
	    success : function(data) {
	        $('#categoryDuoList').html(data);
	        changeFormDuo(document.getElementById("accountsListDuo"));
	    }
	});
}

function changeForm(categoriesList)
{
  var idx = categoriesList.selectedIndex;
  var value = categoriesList.options[idx].value;

  if (value == '')
	  $('#categoryModification').html('');
  else
	  $.ajax({
	      type : 'POST',
		    url : 'page.php',
		    data: {
		        'page': 'administration_category_form', 
		        'area': 'administration',
		        categoryId: value,
		        'data': 'USER'
		    },
	      dataType: 'html',
	      success : function(data) {
	          $('#categoryModification').html(data);
	      }
	  });
}

function changeFormDuo(categoriesList)
{
  var idx = categoriesList.selectedIndex;
  var value = categoriesList.options[idx].value;

  if (value == '')
	  $('#categoryDuoModification').html('');
  else
	  $.ajax({
	      type : 'POST',
		    url : 'page.php',
		    data: {
		        'page': 'administration_category_form', 
		        'area': 'administration',
		        categoryId: value,
		        'data': 'DUO'
		    },
	      dataType: 'html',
	      success : function(data) {
	          $('#categoryDuoModification').html(data);
	      }
	  });
}
</script>