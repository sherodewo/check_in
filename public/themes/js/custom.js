function previewImage() {
  document.getElementById("image-preview").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview").src = oFREvent.target.result;
  };
};

function previewImageFront() {
  document.getElementById("image-preview-front").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source-front").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview-front").src = oFREvent.target.result;
  };
};

function previewImageBack() {
  document.getElementById("image-preview-back").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source-back").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview-back").src = oFREvent.target.result;
  };
};

function previewImageAditional() {
  document.getElementById("image-preview-aditional").style.display = "block";
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image-source-aditional").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("image-preview-aditional").src = oFREvent.target.result;
  };
};

function setSelectionRange(input, selectionStart, selectionEnd) {
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  } else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    console.log(collapse);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}

function setCaretToPos(input, pos) {
  setSelectionRange(input, pos, pos);
}

// RadioButton
const st = {};

st.flap = document.querySelector('#flap');
st.toggle = document.querySelector('.toggle');

st.choice1 = document.querySelector('#choice1');
st.choice2 = document.querySelector('#choice2');

st.flap.addEventListener('transitionend', () => {

  if (st.choice1.checked) {
    st.toggle.style.transform = 'rotateY(-15deg)';
    setTimeout(() => st.toggle.style.transform = '', 400);
  } else {
    st.toggle.style.transform = 'rotateY(15deg)';
    setTimeout(() => st.toggle.style.transform = '', 400);
  }

})

st.clickHandler = (e) => {

  if (e.target.tagName === 'LABEL') {
    setTimeout(() => {
      st.flap.children[0].textContent = e.target.textContent;
    }, 250);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  st.flap.children[0].textContent = st.choice2.nextElementSibling.textContent;
});

document.addEventListener('click', (e) => st.clickHandler(e));