$(document).ready(function(){

  function disablePaste(obj){
    var newObj = null;
    if(typeof(obj) == "object") newObj = obj;
    else if(typeof(obj) == "string") newObj = document.getElementById(obj);
    newObj.onpaste = function(e){
      e.preventDefault();
    }
  }

  function enablePaste(obj){
    var newObj = null;
    if(typeof(obj) == "object") newObj = obj;
    else if(typeof(obj) == "string") newObj = document.getElementById(obj);
    newObj.onpaste = function(e){
      return true;
    }
  }
  // Specify ids on which we are going to prevent paste event
  var idsCopyPaste = ['credt_abb','lastnetprofit'];
  for (var i = 0; i < idsCopyPaste.length; i++) {
    disablePaste(document.getElementById(idsCopyPaste[i]));
  }
  var idsUpperCase = ['pan'];

  for (var i = 0; i < idsUpperCase.length; i++) {
    toUpperCase(idsUpperCase[i]);
  }

  function toUpperCase(id){
      $('#'+id).css('text-transform','uppercase');
  }

  function isNumberKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }

  function isAlphabetKey(evt){
    var charCode = (evt.which) ?evt.which :evt.keyCode;
    if(((charCode >= 65 && charCode <=90) ||((charCode >= 97 && charCode <=122))))
    return true;

    return false;
  }

  function isDecimalNumber(evt,obj){
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains){
        if (charCode == 46) return false;
        if(value.length==value.indexOf('.')+3) return false;
      }
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
  }


  function isLimitedLength(evt,obj,type,len){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    var value = obj.value;

  if(value.length>=len) return false;

  var status = false;
  switch (type) {
    case "integer":
                    status = isNumberKey(evt);
                    break;

    case "decimal":
                    status = isDecimalNumber(evt,obj);
                    break;
    case "character":
                    status = isAlphabetKey(evt);
                    break;
    default:
                    status = false;
                    break;
  }

  return status;

  }


})
