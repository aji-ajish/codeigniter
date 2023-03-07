<!DOCTYPE html>
<html>
<head>
	<title>Country, State, City</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.css"  />

	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		.form {
			background-color: #fff;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
			margin: 50px auto;
			max-width: 500px;
		}
		h1 {
			text-align: center;
			color: #333;
			margin-top: 0;
			margin-bottom: 20px;
		}
		label {
			display: block;
			margin-bottom: 8px;
			color: #666;
		}
		input[type="text"] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="form">
		<h1>auto complete</h1>

		<label for="country">Country:</label>
		<input type="text" id="country"   name="country">

		<label for="state">State:</label>
		<input type="text" id="state" name="state">

		<label for="city">City:</label>
		<input type="text" id="city" name="city">
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"  ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js" ></script>
    <script>

    var options = {
        url:function(query){
        return "<?=base_url()?>AutoComplete/country?query="+query;
       },
       getValue:'country_name',
       list:{
        $("#country").click(function(){
            var id=$("#country").getSelectedItemData().country_id;
            // $(".country").val(id);
			$("#country").addClass(id);

        })
       }
    };
    $(document).ready(function(){
        $("#country").easyAutocomplete(options);
    })

    </script>

</body>
</html>
