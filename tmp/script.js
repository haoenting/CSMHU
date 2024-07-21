function isHidden1(oDiv) {
  var Names = [
    "div1",
    "div2",
    "div3",
    "div4",
    "div5",
    "div6",
    "div7",
    "div8",
    "div9",
    "div10",
  ];
  for (var i = 0; i < 10; i++) {
    document.getElementById(Names[i]).style.display = "none";
  }
  document.getElementById(oDiv).style.display = "block";
}

function changeColor(oTh) {
  var names = [
    "th1",
    "th2",
    "th3",
    "th4",
    "th5",
    "th6",
    "th7",
    "th8",
    "th9",
    "th10",
  ];
  for (var j = 0; j < 10; j++) {
    document.getElementById(names[j]).style.background = "#C4C4C4";
  }
  document.getElementById(oTh).style.background = "#808080";
}

function isHidden2(oDiv) {
  var Names = ["Div1", "Div2", "Div3", "Div4", "Div5"];
  for (var i = 0; i < 5; i++) {
    document.getElementById(Names[i]).style.display = "none";
  }
  document.getElementById(oDiv).style.display = "block";
}

function changeColor2(oTh) {
  var names = ["TH1", "TH2", "TH3", "TH4", "TH5"];
  for (var j = 0; j < 5; j++) {
    document.getElementById(names[j]).style.background = "#C4C4C4";
  }
  document.getElementById(oTh).style.background = "#808080";
}
window.onload = function () {
  var div1 = document.getElementById("th1");
  div1.style.backgroundColor = "#808080";
};
