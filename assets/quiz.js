let questionNum = 1;
let resultNum = 1;

$(document).on("click", ".addAnswer", function () {
  let question = $(this).data("question");
  let answer = $(this).data("answer");
  let answerBlock = $(this).parents(".answers").find(".answer-items");
  answer++;
  $(this).data("answer", answer);

  answerBlock.append(`
        <div class="divider answer-item" data-question="${question}" data-answer="${answer}">
            <label for="answer_text_${question}_${answer}" class="form-label">Ответ #${answer}</label>
            <input type="text" name="answer_text_${question}_${answer}" id="answer_text_${question}_${answer}" class="form-control">
            <div class="mt-2">
                <label for="answer_score_${question}_${answer}" class="form-label">Балл за ответ #${answer}</label>
                <input type="text" name="answer_score_${question}_${answer}" id="answer_score_${question}_${answer}" class="form-control">
            </div>
            <div class="text-center mt-4">
            
                <button type="button" class="btn btn-danger removeAnswer" data-question="${question}" data-answer="${answer}">Удалить вариант ответа</button>
            </div>
        </div>`);
});
$(document).on("click", ".removeAnswer", function () {
  let question = $(this).data("question");
  let answer = $(this).data("answer");

  // Находим блок с вариантами ответов и удаляем его
  $(
    `.answer-item[data-question="${question}"][data-answer="${answer}"]`
  ).remove();
});

$(".addQuestion").on("click", function () {
  questionNum++;
  let questionBlock = $(".question-items");

  questionBlock.append(`
        <div class="mt-4 question-item" data-question-id="${questionNum}">
            <label for="question_${questionNum}" class="form-label">Вопрос #${questionNum}</label>
            <input type="text" name="question_${questionNum}" id="question_${questionNum}" class="form-control">
            <div class="answers">
                <div class="answer-items">
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-light border addAnswer" data-question="${questionNum}" data-answer="0">Добавить вариант ответа</button>
                    <button type="button" class="btn btn-danger removeQuestion" data-question-id="${questionNum}">Удалить вопрос</button>
                </div>
            </div>
        </div>`);
});

$(document).on("click", ".removeQuestion", function () {
  // Получаем уникальный идентификатор вопроса
  let questionId = $(this).data("question-id");

  // Находим блок с вопросами
  let questionBlock = $(`.question-item[data-question-id="${questionId}"]`);

  // Удаляем блок с выбранным вопросом
  questionBlock.remove();
});

$(document).on("click", ".removeResult", function () {
  // Получаем уникальный идентификатор результата
  let resultId = $(this).data("result-id");

  // Находим блок с результатами
  let resultBlock = $(`.result-item[data-result-id="${resultId}"]`);

  // Удаляем блок с выбранным результатом
  resultBlock.remove();
});

$(document).on("click", ".addResult", function () {
  resultNum++;
  let resultBlock = $(".result-items");

  resultBlock.append(`
        <div class="mt-4 divider result-item" data-result-id="${resultNum}">
            <div class="">
                <label for="result_${resultNum}" class="form-label">Результат #${resultNum}</label>
                <textarea name="result_${resultNum}" id="result_${resultNum}" class="form-control"></textarea>
            </div>
            <div class="mt-2">
                <label for="result_score_min_${resultNum}" class="form-label">Балл (от) #${resultNum}</label>
                <input type="text" name="result_score_min_${resultNum}" id="result_score_min_${resultNum}" class="form-control">
            </div>
            <div class="mt-2">
                <label for="result_score_max_${resultNum}" class="form-label">Балл (до) #${resultNum}</label>
                <input type="text" name="result_score_max_${resultNum}" id="result_score_max_${resultNum}" class="form-control">
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-danger removeResult" data-result-id="${resultNum}">Удалить результат</button>
            </div>
        </div>`);
});
