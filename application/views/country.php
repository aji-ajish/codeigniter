<!DOCTYPE html>
<html>
<head>
	<title>Select Fields Example</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<style>
/* Style for the form container */
div {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f2f2f2;
}

/* Style for the form element */
form {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  width: 40%;
  height: 50%;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
}

/* Style for the labels */
label {
  font-size: 1.2em;
  font-weight: bold;
  margin-right: 10px;
}

/* Style for the select element */
select {
  padding: 10px;
  margin-right: 10px;
  margin-bottom: 20px;
  width: 100%;
  height: 40px;
  font-size: 18px;
  border: none;
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

/* Style for the submit button */
input[type="submit"] {
  padding: 10px 20px;
  margin-top: 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

	</style>
</head>
<body>
    <div>
	<form>
		<label for="country">Country:</label>
		<select id="country" name="country">
            <option value="">--select country--</option>
        <?php foreach($countries as $country){?>
            <option value="<?= $country->country_id?>"><?= $country->country_name?></option>
        <?php }?>
        </select>
		<label for="state">State:</label>
		<select id="state" name="state">
        <option value="">--select state--</option>
        </select>

		<label for="city">City:</label>
		<select id="city" name="city">
        <option value="">--select city--</option>
        </select>
	</form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"  ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').select2();
        });
        $(document).ready(function() {
            $('#state').select2();
        });
        $(document).ready(function() {
            $('#city').select2();
        });
        $(document).ready(function(){
            $('#country').change(function(){
                var conutry_id=$(this).val();
                if(conutry_id !=''){
                    $.ajax({
                        url:"<?=base_url('Country/getstate')?>",
                        method:"get",
                        data:{conutry_id:conutry_id},
                        success:function(data){
                            $('#state').html(data); 
                            $('#city').html("<option value=''>--select city--</option>");
                        }
                    })
                }else{
                    $('#state').html("<option value=''>--select state--</option>");
                    $('#city').html("<option value=''>--select city--</option>");
                }
            });
            
        });
        $('#state').change(function(){
                var state_id=$(this).val();
                if(state_id !=''){
                    $.ajax({
                        url:"<?=base_url('Country/getcity')?>",
                        method:"get",
                        data:{state_id:state_id},
                        success:function(data){
                            $('#city').html(data);  
                        }
                    })
                }else{city
                    $('#city').html("<option value=''>--select city--</option>");
                }
            })
    </script>
</body>
</html>