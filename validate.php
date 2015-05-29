<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
jQuery.validator.setDefaults({
	debug: true,
	success: "valid"
});;
</script>

  <script>
  $(document).ready(function(){
    $("#myform").validate({
  rules: {
    field: "required"
  }
});
  });
  </script>
  <style>#field { margin-left: .5em; float: left; }
  	#field, label { float: left; font-family: Arial, Helvetica, sans-serif; font-size: small; }
	br { clear: both; }
	input { border: 1px solid black; margin-bottom: .5em;  }
	input.error { border: 1px solid red; }
	label.error {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/unchecked.gif') no-repeat;
		padding-left: 16px;
		margin-left: .3em;
	}
	label.valid {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/checked.gif') no-repeat;
		display: block;
		width: 16px;
		height: 16px;
	}
</style>
</head>
<body>
  
<form id="myform">
  <label for="field">Required: </label>
  <input class="left" id="field" name="field" />
  <br/>
  <input type="submit" value="Validate!" />
</form>

</body>
</html>