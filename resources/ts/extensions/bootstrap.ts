import { Modal, Toast } from "bootstrap";

export function init(document: Document) {
    modal(document);
    toast(document);
}

function modal(_: Document) {
    Modal;
}

function toast(document: Document) {
    const toastElList = document.querySelectorAll("[data-bs-toggle=toast]");
    toastElList.forEach((toastEl) => new Toast(toastEl).show());
}
