const textarea = document.getElementById("tweetContent");
const charCount = document.getElementById("charCount");

textarea.addEventListener("input", function () {
  const remaining = 140 - this.value.length;
  charCount.textContent = remaining + " caractères restants";
});
