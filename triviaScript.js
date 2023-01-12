(function () {

    function buildQuiz() {

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
        quizContainer.innerHTML = output.join('');
    }

    function submitQuiz() {

        let numCorrect = 0;
        
        // gatering all possible answers
        const answerContainers = quizContainer.querySelectorAll('.answers');
        
        

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

            if (numCorrect >= 8) {
                window.location = "winner.html";
            } else if (numCorrect < 8) {
                window.location = "other.html";
            }

        });

    }

    const quizContainer = document.getElementById('quiz');
    const submitButton = document.getElementById('submit');

    const myQuestions = [

    {
        question: "How long is an olympic swimming pool?",
        answers: {
            a: '100cm',
            b: '75ft',
            c: '50m',
            d: '65.5yd'
        },
        correctAnswer: 'c'
    },

    {
        question: "What is 'Cynophobia'?",
        answers: {
            a: 'Fear of Dogs',
            b: 'Fear of Grass',
            c: 'Fear of Cycles',
            d: 'None of the above'
        },
        correctAnswer: 'a'
    },

    {
        question: "What is the rarest M&M color?",
        answers: {
            a: 'Brown',
            b: 'Green',
            c: 'Red',
            d: 'Purple'
        },
        correctAnswer: 'a'
    },

    {
        question: "T/F: The atomic number for lithium is 17.",
        answers: {
            a: 'True',
            b: 'False'
        },
        correctAnswer: 'b'
    },

    {
        question: "Which country invented ice cream?",
        answers: {
            a: 'Canada',
            b: 'France',
            c: 'China',
            d: 'Russia'
        },
        correctAnswer: 'c'
    },

    {
        question: "What sport is dubbed the 'king of sports'?",
        answers: {
            a: 'Football',
            b: 'Soccer',
            c: 'Boxing',
            d: 'Hockey'
        },
        correctAnswer: 'b'
    },

    {
        question: "How many hearts does an octopus have?",
        answers: {
            a: '8',
            b: '5',
            c: '0',
            d: '3'
        },
        correctAnswer: 'd'
    },

    {
        question: "T/F: The Battle of Hastings took place in 1066.",
        answers: {
            a: 'True',
            b: 'False'
        },
        correctAnswer: 'a'
    },

    {
        question: "Who invented the word 'Vomit'?",
        answers: {
            a: 'William Shakespeare',
            b: 'Winston Churchill',
            c: 'Queen Elizabeth II',
            d: 'Napoleon Bonaparte'
        },
        correctAnswer: 'a'
    },

    {
        question: "Which animal can be seen on the Porsche logo?",
        answers: {
            a: 'Ram',
            b: 'Eagle',
            c: 'Phoenix',
            d: 'Horse'
        },
        correctAnswer: 'd'
    }
    ];

    buildQuiz();

    submitButton.addEventListener('click', submitQuiz);

})();

