// document.getElementById("user-search").addEventListener("input", function () {
//     const query = this.value;
//     const suggestions = document.getElementById("suggestions");

//     // Hide suggestions if query is too short
//     if (query.length < 2) {
//         suggestions.innerHTML = "";
//         suggestions.classList.add("hidden");
//         return;
//     }

//     // Fetch suggestions from the server
//     fetch(`{{ route('user.suggestions') }}?query=${query}`)
//         .then((response) => response.json())
//         .then((data) => {
//             suggestions.innerHTML = "";

//             if (data.length > 0) {
//                 suggestions.classList.remove("hidden");
//                 data.forEach((user) => {
//                     const suggestionItem = document.createElement("div");
//                     suggestionItem.classList.add(
//                         "p-2",
//                         "hover:bg-gray-100",
//                         "cursor-pointer"
//                     );
//                     suggestionItem.textContent = user.name;

//                     // Handle click on suggestion
//                     suggestionItem.addEventListener("click", () => {
//                         document.getElementById("user-search").value =
//                             user.name;
//                         suggestions.innerHTML = "";
//                         suggestions.classList.add("hidden");
//                     });

//                     suggestions.appendChild(suggestionItem);
//                 });
//             } else {
//                 suggestions.classList.add("hidden");
//             }
//         })
//         .catch((error) => console.error("Error fetching suggestions:", error));
// });

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        const sessionMessage = document.getElementById("session-message");
        if (sessionMessage) {
            sessionMessage.style.display = "none";
        }
    }, 2000);
});
