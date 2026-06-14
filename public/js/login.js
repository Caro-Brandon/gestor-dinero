document.addEventListener("DOMContentLoaded", () => {

    const messages = document.querySelectorAll(
        ".message-auto-close"
    );

    messages.forEach(message => {

        setTimeout(() => {

            message.classList.add("hide-message");

            setTimeout(() => {

                message.remove();

            }, 400);

        }, 4000);

    });

});