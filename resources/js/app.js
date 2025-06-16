import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import Quill from "quill";
import "quill/dist/quill.snow.css";

document.addEventListener("DOMContentLoaded", () => {
    const quill = new Quill("#editor", {
        theme: "snow",
        placeholder: "Tulis sesuatu...",
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block"],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ script: "sub" }, { script: "super" }],
                [{ indent: "-1" }, { indent: "+1" }],
                [{ direction: "rtl" }],
                [{ size: ["small", false, "large", "huge"] }],
                [{ color: [] }, { background: [] }],
                [{ font: [] }],
                [{ align: [] }],
                ["link", "image", "video"],
                ["clean"], // remove formatting button
            ],
        },
    });

    const form = document.querySelector("#form-konten");
    form.addEventListener("submit", () => {
        document.getElementById("konten-hidden").value = quill.root.innerHTML;
    });
});

import "flowbite";
