const formModal = document.querySelector(".book-modal form");
const btnModalSubmit = document.querySelector(
  ".book-modal .modal-footer .btn-submit"
);
const btnEdit = document.querySelectorAll(".btn-edit");
const btnAdd = document.querySelector("#btn-add");
const closeModalBtn = document.querySelector("#close-modal");
const btnClose = document.querySelector("#btn-close");
const modalTitleBook = document.querySelector("h1.modal-title-book");
const selectBookCategory = document.querySelector("select#id_kategori");
const judulBuku = document.querySelector("#judul_buku");
const penulis = document.querySelector("#penulis");
const penerbit = document.querySelector("#penerbit");

const resetFormModalBuku = () => {
  judulBuku.value = "";
  penulis.value = "";
  penerbit.value = "";
};

btnAdd.addEventListener("click", () => {
  formModal.setAttribute("action", config.routes.storeBook);
  modalTitleBook.textContent = "Form Tambah data buku";
});

btnEdit.forEach((btn) => {
  btn.addEventListener("click", () => {
    const idBuku = btn.dataset.idBuku;
    modalTitleBook.textContent = "Form Ubah data buku";

    fetch(`/buku/${idBuku}`)
      .then((res) => res.json())
      .then((data) => {
        const updateBook = config.routes.updateBook.replace(
          ":id_buku",
          data.id_buku
        );
        selectBookCategory.options[data.id_kategori - 1].selected = true;
        judulBuku.value = data.judul_buku;
        penulis.value = data.penulis;
        penerbit.value = data.penerbit;
        formModal.setAttribute("action", updateBook);
      });
  });
});

closeModalBtn.addEventListener("click", resetFormModalBuku);
btnClose.addEventListener("click", resetFormModalBuku);
