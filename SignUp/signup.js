document.addEventListener("DOMContentLoaded", function() {
    const personTypeSelect = document.getElementById("personTypeSelect");
    const departmentGroup = document.getElementById("departmentGroup");

    personTypeSelect.addEventListener("change", function() {
        if (this.value === "employee") {
            departmentGroup.style.display = "block";
        } else {
            departmentGroup.style.display = "none";
        }
    });
});
