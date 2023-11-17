// Trigger a Livewire event to refresh chapter content
// jQuery code to handle dropdown chapter selection
$(document).ready(function () {
    $("a.chapter-link").click(function (e) {
        e.preventDefault(); // Prevent the default link behavior

        var chapterId = $(this).data("chapter-id"); // Get the chapter ID from the link data attribute or other suitable method

        // Make an AJAX request to fetch the chapter content based on the selected chapter ID
        $.ajax({
            url: "/fetch-chapter/" + chapterId, // Replace with your route to fetch chapter content
            method: "GET",
            success: function (response) {
                // Update the content on your page with the fetched chapter content
                $("#chapter-title").text(response.title);
                $("#chapter-content").html(response.content);
            },
            error: function (xhr, status, error) {
                console.error(error); // Handle error cases
            },
        });
    });
});
