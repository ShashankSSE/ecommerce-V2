$(document).ready(function(){
    var currentPath = window.location.pathname;
    
    if (currentPath === '/enquiry/contact-us') {
        document.getElementById('welcomeText').textContent = 'Contact Us Details';
    }else if(currentPath === '/enquiry/newsletters'){
      document.getElementById('welcomeText').textContent = 'Newsletters';
    }else if(currentPath === '/enquiry/book-demo'){
      document.getElementById('welcomeText').textContent = 'Book Demo Details';
    }else if(currentPath === '/category/create-category' || currentPath === '/category'){
      document.getElementById('welcomeText').textContent = 'Category';
    }else{
      document.getElementById('welcomeText').textContent = 'Dashboard';
    }
    
});

var sizeDivCount = 1;
var weightDivCount = 1;
var colorDivCount = 1;
var unitDivCount = 1;

function addMoreSizeButton(attributes){
  var sizeAttributes = attributes.filter(function(attribute) {
      return attribute.label === 'size';
  });
  

  if(sizeDivCount > 1){
    for(var i=1; i<sizeDivCount; i++){
        var closeButtonToBeRemoved = document.getElementById('sizeCloseAttribute_' + i);
        closeButtonToBeRemoved.style.display = 'none';
    }            
  }
  
  var card = document.createElement('div');
  var cardContainer = document.createElement('div');
  card.classList.add('card');
  card.id = 'card_' + sizeDivCount;
  cardContainer.classList.add('card-body');
  card.style.marginBottom = '10px';
  
  var attributeUnitFormGroup = document.createElement('div');
  attributeUnitFormGroup.classList.add('form-group');
  attributeUnitFormGroup.innerHTML = `
    <label for="attributeUnit">Select Attribute Unit</label><br>
    <select class="form-control js-example-basic-single" name="attributeUnit_${sizeDivCount}" id="attributeUnit_${sizeDivCount}" required>
        <option selected disabled>Attribute Unit</option>` +
        sizeAttributes.map(function(attribute) {
            return `<option value="${attribute.name}">${attribute.name}</option>`;
        }).join('') +
    `</select>`;
  
  cardContainer.appendChild(attributeUnitFormGroup);
  
  var mrpFormGroup = document.createElement('div');
  mrpFormGroup.classList.add('form-group');
  mrpFormGroup.innerHTML = `
      <label for="mrp">Market Price</label>
      <input type="number" class="form-control" id="mrp_${sizeDivCount}" name="mrp_${sizeDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(mrpFormGroup);

  
  var sellingFormGroup = document.createElement('div');
  sellingFormGroup.classList.add('form-group');
  sellingFormGroup.innerHTML = `
      <label for="selling">Selling Price</label>
      <input type="number" class="form-control" id="selling_${sizeDivCount}" name="selling_${sizeDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(sellingFormGroup);

   

  
  var closeButton = document.createElement('div');
  closeButton.classList.add('closeAttribute');
  closeButton.id = 'sizeCloseAttribute_' + sizeDivCount;
  closeButton.innerHTML = '<i class="mdi mdi-close"></i>';
  closeButton.onclick = function() {
      
      card.remove();
      sizeDivCount--;
      
      document.getElementById('totalSize').innerHTML = (sizeDivCount-1);
      var closeButtonToBeRemoved = document.getElementById('sizeCloseAttribute_' + (sizeDivCount-1));
      closeButtonToBeRemoved.style.display = 'block';
  };
  

  cardContainer.appendChild(closeButton);
  card.appendChild(cardContainer);
  
  document.getElementById('sizeAttributeBox').appendChild(card);
 
  document.getElementById('totalSize').innerHTML = sizeDivCount;
  sizeDivCount ++;
}
function addMoreWeightButton(attributes){
  var weightAttributes = attributes.filter(function(attribute) {
    return attribute.label === 'weight';
  });
  if(weightDivCount > 1){
      for(var i=1; i<weightDivCount; i++){
          var closeButtonToBeRemoved = document.getElementById('weightCloseAttribute_' + i);
          closeButtonToBeRemoved.style.display = 'none';
      }            
  }

  var card = document.createElement('div');
  var cardContainer = document.createElement('div');
  card.classList.add('card');
  card.id = 'card_' + weightDivCount;
  cardContainer.classList.add('card-body');
  card.style.marginBottom = '10px';

  var attributeUnitFormGroup = document.createElement('div');
  attributeUnitFormGroup.classList.add('form-group');
  attributeUnitFormGroup.innerHTML = `
      <label for="weightAttributeUnit_">Select Attribute Unit</label><br>
      <select class="form-control js-example-basic-single" name="weightAttributeUnit_${weightDivCount}" id="weightAttributeUnit_${weightDivCount}" required>
      <option selected disabled>Attribute Unit</option>` +
      weightAttributes.map(function(attribute) {
          return `<option value="${attribute.name}">${attribute.name}</option>`;
      }).join('') +
  `</select>`;
  cardContainer.appendChild(attributeUnitFormGroup);


  var mrpFormGroup = document.createElement('div');
  mrpFormGroup.classList.add('form-group');
  mrpFormGroup.innerHTML = `
      <label for="mrp">Market Price</label>
      <input type="number" class="form-control" id="weightMrp_${weightDivCount}" name="weightMrp_${weightDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(mrpFormGroup);


  var sellingFormGroup = document.createElement('div');
  sellingFormGroup.classList.add('form-group');
  sellingFormGroup.innerHTML = `
      <label for="selling">Selling Price</label>
      <input type="number" class="form-control" id="weightSelling_${weightDivCount}" name="weightSelling_${weightDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(sellingFormGroup);

 

  var closeButton = document.createElement('div');
  closeButton.classList.add('closeAttribute');
  closeButton.id = 'weightCloseAttribute_' + weightDivCount;
  closeButton.innerHTML = '<i class="mdi mdi-close"></i>';
  closeButton.onclick = function() {
      
      card.remove();
      weightDivCount--;
      
      document.getElementById('totalWeight').innerHTML = (weightDivCount-1);
      var closeButtonToBeRemoved = document.getElementById('weightCloseAttribute_' + (weightDivCount-1));
      closeButtonToBeRemoved.style.display = 'block';
  };


  cardContainer.appendChild(closeButton);
  card.appendChild(cardContainer);

  document.getElementById('weightAttributeBox').appendChild(card);
 
  document.getElementById('totalWeight').innerHTML = weightDivCount;
  weightDivCount ++;
}
function addMoreColorButton(attributes){
  var colorAttributes = attributes.filter(function(attribute) {
    return attribute.label === 'color';
  });
  if(colorDivCount > 1){
      for(var i=1; i<colorDivCount; i++){
          var closeButtonToBeRemoved = document.getElementById('colorCloseAttribute_' + i);
          closeButtonToBeRemoved.style.display = 'none';
      }            
  }

  var card = document.createElement('div');
  var cardContainer = document.createElement('div');
  card.classList.add('card');
  card.id = 'card_' + colorDivCount;
  cardContainer.classList.add('card-body');
  card.style.marginBottom = '10px';

  var attributeUnitFormGroup = document.createElement('div');
  attributeUnitFormGroup.classList.add('form-group');
  attributeUnitFormGroup.innerHTML = `
      <label for="colorAttributeUnit_">Select Attribute Unit</label><br>
      <select class="form-control js-example-basic-single" name="colorAttributeUnit_${colorDivCount}" id="colorAttributeUnit_${colorDivCount}" required>
        <option selected disabled>Attribute Unit</option>` +
        colorAttributes.map(function(attribute) {
            return `<option value="${attribute.name}">${attribute.name}</option>`;
        }).join('') +
    `</select>`;
  cardContainer.appendChild(attributeUnitFormGroup);


  var mrpFormGroup = document.createElement('div');
  mrpFormGroup.classList.add('form-group');
  mrpFormGroup.innerHTML = `
      <label for="mrp">Market Price</label>
      <input type="number" class="form-control" id="colorMrp_${colorDivCount}" name="colorMrp_${colorDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(mrpFormGroup);


  var sellingFormGroup = document.createElement('div');
  sellingFormGroup.classList.add('form-group');
  sellingFormGroup.innerHTML = `
      <label for="selling">Selling Price</label>
      <input type="number" class="form-control" id="colorSelling_${colorDivCount}" name="colorSelling_${colorDivCount}" placeholder="" required>
  `;
  cardContainer.appendChild(sellingFormGroup);

 

  var closeButton = document.createElement('div');
  closeButton.classList.add('closeAttribute');
  closeButton.id = 'colorCloseAttribute_' + colorDivCount;
  closeButton.innerHTML = '<i class="mdi mdi-close"></i>';
  closeButton.onclick = function() {
      
      card.remove();
      colorDivCount--;
      document.getElementById('totalColor').innerHTML = (colorDivCount-1);
      
      var closeButtonToBeRemoved = document.getElementById('colorCloseAttribute_' + (colorDivCount-1));
      closeButtonToBeRemoved.style.display = 'block';
  };


  cardContainer.appendChild(closeButton);
  card.appendChild(cardContainer);

  document.getElementById('colorAttributeBox').appendChild(card);
 
  document.getElementById('totalColor').innerHTML = colorDivCount;
  colorDivCount ++;
}

function addMoreUnitButton(attributes){

  var unitAttributes = attributes.filter(function(attribute) {
    return attribute.label === 'unit';
  });
  if(unitDivCount > 1){
    for(var i=1; i<unitDivCount; i++){
        var closeButtonToBeRemoved = document.getElementById('unitCloseAttribute_' + i);
        closeButtonToBeRemoved.style.display = 'none';
    }            
}

var card = document.createElement('div');
var cardContainer = document.createElement('div');
card.classList.add('card');
card.id = 'card_' + unitDivCount;
cardContainer.classList.add('card-body');
card.style.marginBottom = '10px';

var attributeUnitFormGroup = document.createElement('div');
attributeUnitFormGroup.classList.add('form-group');
attributeUnitFormGroup.innerHTML = `
    <label for="unitAttributeUnit_">Select Attribute Unit</label><br>
    <select class="form-control js-example-basic-single" name="unitAttributeUnit_${unitDivCount}" id="unitAttributeUnit_${unitDivCount}" required>
      <option selected disabled>Attribute Unit</option>` +
      unitAttributes.map(function(attribute) {
          return `<option value="${attribute.name}">${attribute.name}</option>`;
      }).join('') +
  `</select>`;
cardContainer.appendChild(attributeUnitFormGroup);


var mrpFormGroup = document.createElement('div');
mrpFormGroup.classList.add('form-group');
mrpFormGroup.innerHTML = `
    <label for="mrp">Market Price</label>
    <input type="number" class="form-control" id="unitMrp_${unitDivCount}" name="unitMrp_${unitDivCount}" placeholder="" required>
`;
cardContainer.appendChild(mrpFormGroup);


var sellingFormGroup = document.createElement('div');
sellingFormGroup.classList.add('form-group');
sellingFormGroup.innerHTML = `
    <label for="selling">Selling Price</label>
    <input type="number" class="form-control" id="unitSelling_${unitDivCount}" name="unitSelling_${unitDivCount}" placeholder="" required>
`;
cardContainer.appendChild(sellingFormGroup);
 
var closeButton = document.createElement('div');
closeButton.classList.add('closeAttribute');
closeButton.id = 'unitCloseAttribute_' + unitDivCount;
closeButton.innerHTML = '<i class="mdi mdi-close"></i>';
closeButton.onclick = function() {
    
    card.remove();
    unitDivCount--;
    
    document.getElementById('totalUnit').innerHTML = (unitDivCount-1);
    var closeButtonToBeRemoved = document.getElementById('unitCloseAttribute_' + (unitDivCount-1));
    closeButtonToBeRemoved.style.display = 'block';
};


cardContainer.appendChild(closeButton);
card.appendChild(cardContainer);

document.getElementById('unitAttributeBox').appendChild(card);
 
document.getElementById('totalUnit').innerHTML = unitDivCount;
unitDivCount ++;
}
 
function validateSlug(input) {
  // Remove any non-alphanumeric characters except hyphens
  input.value = input.value.replace(/[^a-zA-Z0-9-]/g, '');

  // Remove leading hyphens, spaces, and special characters (except the first one)
  input.value = input.value.replace(/^[^\w-]+/, '');

  // Remove consecutive hyphens, spaces, and special characters
  input.value = input.value.replace(/[-\s_]+/g, '-');

  // Remove trailing hyphens, spaces, and special characters
  input.value = input.value.replace(/[^\w-]+$/, '');
}