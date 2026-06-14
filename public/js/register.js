const passwordInput = document.getElementById("password");

const rules = [
    {
        id: "rule-length",
        test: value => value.length >= 8
    },
    {
        id: "rule-uppercase",
        test: value => /[A-Z]/.test(value)
    },
    {
        id: "rule-lowercase",
        test: value => /[a-z]/.test(value)
    },
    {
        id: "rule-number",
        test: value => /[0-9]/.test(value)
    },
    {
        id: "rule-special",
        test: value => /[!@#$%^&*()_\-+=\[\]{};:,.<>?\/\\|~`]/.test(value)
    }
];

if (passwordInput) {

    passwordInput.addEventListener("input", () => {

        rules.forEach(rule => {

            const element = document.getElementById(rule.id);

            if (!element) {
                return;
            }

            const icon = element.querySelector("i");

            if (rule.test(passwordInput.value)) {

                element.classList.remove("invalid");
                element.classList.add("valid");

                icon.className = "bi bi-check-circle-fill";

            } else {

                element.classList.remove("valid");
                element.classList.add("invalid");

                icon.className = "bi bi-x-circle-fill";

            }

        });

    });

}

const messages = document.querySelectorAll(
    ".message-error,.message-success"
);

messages.forEach(message => {

    setTimeout(() => {

        message.classList.add("hide-message");

        setTimeout(() => {

            message.remove();

        }, 400);

    }, 4000);

});