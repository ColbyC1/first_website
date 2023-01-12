(function () {

    function buildQuestions() {

        const output = [];

        myQuestions.forEach(
            (currentQuestion, questionNumber) => {

                const answers = [];

            // for each letter, ignore syntax error
                for (var letter in currentQuestion.answers) {

                    // adding radio button
                    answers.push(
                        `<label>
                        <input type="radio" name="question${questionNumber}" value="${letter}">
                        ${letter} : ${currentQuestion.answers[letter]}
                        </label>`
                        );
                }

            // answer/question format
                output.push(
                    `<ul>
                    <div class="slide">
                    <div class="question">
                    <li>${currentQuestion.question}</li>
                    </div>
                    <div class="answers"> ${answers.join("")}
                    </div>
                    </div>
                    </ul>`
                    );
            });

        // finally combine output list into string for HTML to render
        questionsContainer.innerHTML = output.join('');
    }

    function submitSurvey() {
        let numCorrect = 0;

        // gatering all possible answers
        const answerContainers = questionsContainer.querySelectorAll('.answers');



        // for each question
        myQuestions.forEach((currentQuestion, questionNumber) => {

            // find selected answer
            const answerContainer = answerContainers[questionNumber];
            const selector = `input[name=question${questionNumber}]:checked`;
            const userAnswer = (answerContainer.querySelector(selector) || {}).value;

            // if answer is correct
            if (userAnswer === currentQuestion.correctAnswer) {
                numCorrect++;
            }

            if (numCorrect >= 0) {
                window.location = "trivia.html";
            }
        });

    }

    const questionsContainer = document.getElementById('questions');
    const submitButton = document.getElementById('submit');

    const myQuestions = [

    {
        question: "Which social media do you use most?",
        answers: {
            a: 'Facebook',
            b: 'Instagram',
            c: 'Twitter',
            d: 'Snapchat',
            e: 'Other'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which phone brand do you own?",
        answers: {
            a: 'Apple',
            b: 'Android',
            c: 'Samsung',
            d: 'Nokia',
            e: 'Other'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which search engine do you use most?",
        answers: {
            a: 'Bing',
            b: 'Google',
            c: 'Yandex',
            d: 'Swisscows',
            e: 'Other'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which shoe brand do you shop for most?",
        answers: {
            a: 'Nike',
            b: 'Puma',
            c: 'Adidas',
            d: 'New Balance',
            e: 'Other'
        },
        correctAnswer: 'b'
    },

    {
        question: "If you were able to change your name and disappear right now, would you do it? <br>" 
        + "*Don't worry, we won't tell.*",
        answers: {
            a: 'Yes',
            b: 'No'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which of these sports would you watch daily if possible?",
        answers: {
            a: 'Lacrosse',
            b: 'Soccer',
            c: 'Boxing',
            d: 'Swimming',
            e: 'Other'
        },
        correctAnswer: 'b'
    },

    {
        question: "Which, out of the four seasons, would you remove from existence?",
        answers: {
            a: 'Fall',
            b: 'Spring',
            c: 'Summer',
            d: 'Winter'
        },
        correctAnswer: 'd'
    },

    {
        question: "Which cuisine would you recommend to a friend?",
        answers: {
            a: 'Japanese',
            b: 'Indian',
            c: 'Spanish',
            d: 'American',
            e: 'Other'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which music genre do you find most enjoyable?",
        answers: {
            a: 'Country',
            b: 'Pop',
            c: 'Jazz',
            d: 'Heavy Metal',
            e: 'Other'
        },
        correctAnswer: 'a'
    },

    {
        question: "Do you know the muffin man?",
        answers: {
            a: 'Yes'
        },
        correctAnswer: 'a'
    }
    ];

    buildQuestions();

    submitButton.addEventListener('click', submitSurvey);

})();

