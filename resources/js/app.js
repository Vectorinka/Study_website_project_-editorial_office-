import {show} from './script';

window.show = show;

document.getElementById("testForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const answers = ["язык разметки гипертекста", "команда, заключенная в угловые скобки", "разделения текста на абзацы", "сайтом", "текстовый файл с расширением *.htm или *.html", "Чтобы определить метаданные о HTML-документе"];
    let correctAnswers = 0;
    let incorrectAnswers = [];
    for (let i = 1; i <= 6; i++) {
      if (document.getElementsByName(`q${i}`)[0].value === answers[i - 1]) {
        correctAnswers++;
      } else {
        incorrectAnswers.push(`Вопрос ${i}: ${document.getElementsByName(`q${i}`)[0].value}`);
      }
    }
    alert(`Правильных ответов: ${correctAnswers}\nНеправильных ответов: ${incorrectAnswers.join("\n")}`);
  });