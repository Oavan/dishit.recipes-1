//Version: 2011-11-17

	//This JavaScript intercepts keystrokes in a text box or
	//text area, and ignores all characters EXCEPT 0-9, comma, period, $
	
	//To use this script in your page:
	//	1. Include a reference to this file in the <head> tag
	//     <script type="text/javascript" src="CurrencyKeyPress.js"></script>
	//                                     (set the path as appropriate)
	//
	//  2. Add an event handler for the text box or text areas of your choice.  
	//		 window.onload = function( ) {
	//				$("txtBoxName").onkeypress = CurrencyKeyPress;  //No (  )
	//
	//     } //end onload
	
	
	// You shouldn't have to call getSelectedText directly, but you could if you needed it somewhere
	// else in your JavaScript
	
	//Know issues:
	//   In FF and Opera arrow keys become disabled
	//		Arrow keys return keycode 37-40 which are the same as % ' & (   (weird)
	//   User can enter a $, then move to the left of it and enter
	//      additional characters.  I can't seem to find a way to 
	//      detect the cursor position using IE.
	//      Be sure your JavaScript removes excess characters before parsing the value

	
	//This function returns the selected text in the field designated in the parameter.
/*	function getSelectedText(aField) {
		var selectedText="";
		if (document.selection) {  //For IE
			var sel			
			aField.focus();
			sel = document.selection.createRange();
			selectedText = sel.text;
			
		} else if(aField.selectionStart || aField.selectionStart=='0') {
			//For Firefox
			var startPos = 	aField.selectionStart;
			var endPos = aField.selectionEnd;
			
			selectedText = aField.value.substring(startPos, endPos);
		}//endif
				
		return selectedText;
	}//end getSelectedText
*/	
	function CurrencyKeyPress(e)
	{

		e = e || window.event; //FF uses parameter, this is for IE
		
		var key = e.keyCode || e.which;  //FF || IE
		
		var el = e.srcElement? e.srcElement : e.target;  //FF : IE
		var selText = getSelectedText(el);	
		switch (key) {
			case 8: //backspace (for FF)  and Tab (for FF)
			case 9: return true; break;
			
			case 36: //$
               if (el.value!="") {//if this is first character, allow it without worrying about selections (causes selection error)
                   if (selText.indexOf("$")!=-1) return true;  //Selection includes $--must be OK
                   else if (el.value.indexOf("$")==-1 ) {      //There is no dollar sign
                     if(el.selectionStart) {  //FF
                        el.focus();
                        el.setSelectionRange(0,0);
                     }else{ //IE	
                        var rng = el.createTextRange();				 //Designate the entire text of the text box
                        rng.move('character',0);					 //Force to beginning of field
                        rng.select();								 //Show the cursor
                     }//endif						
                     return true;							 //Display the $
                   }
                   else return false;
               } 
               else return true;
					break;
			case 44:  //comma
					 return true;   //Commas are allowed anywhere. Be sure to remove them before parsing
					 break;
			case 46: //Decimal point
					 return (selText.indexOf(".")!=-1 || el.value.indexOf(".")==-1); 
					 //OK if: selection contains .        text does not contain .		
					 break;

			case 48: //digits
			case 49:
			case 50:
			case 51:
			case 52:
			case 53:
			case 54:
			case 55:
			case 56: 
			case 57: return true;
			         break;
					 
			default: return false;  //All other keys are not accepted/ignored
		}//end switch
			

	}//end CurrencyKeyPress
