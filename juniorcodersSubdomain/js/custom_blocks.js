  Blockly.Blocks['sari_dreapta'] = {
	  init: function() {
		this.appendDummyInput()
			.setAlign(Blockly.ALIGN_CENTRE)
			.appendField(new Blockly.FieldImage("img/arrow1.png", 45, 45, "*"))
			.appendField("Sari in dreapta-sus");
		this.setPreviousStatement(true);
		this.setNextStatement(true);
		this.setColour(210);
		this.setTooltip('');
		this.setHelpUrl('http://junior.ironcoders.com/');
	  }
	};
	Blockly.Blocks['mergi_dreapta'] = {
	  init: function() {
		this.appendDummyInput()
			.setAlign(Blockly.ALIGN_CENTRE)
			.appendField(new Blockly.FieldImage("img/arrow2.png", 45, 45, "*"))
			.appendField("Mergi in dreapta");
		this.setPreviousStatement(true);
		this.setNextStatement(true);
		this.setColour(210);
		this.setTooltip('');
		this.setHelpUrl('http://junior.ironcoders.com/');
	  }
	};
	
	Blockly.JavaScript['mergi_dreapta'] = function(block) {
	  // TODO: Assemble JavaScript into code variable.
	  var code = 'mergi_dreapta();';
	  return code;
	};
	Blockly.JavaScript['sari_dreapta'] = function(block) {
	  // TODO: Assemble JavaScript into code variable.
	  var code = 'sari_dreapta();';
	  return code;
	};