const editBtn = document.querySelectorAll(".edit-btn");
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

editBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    const idBuku = btn.dataset.idBuku;
    modalTitleBook.textContent = "Form Ubah data buku";

    fetch(`/buku/${idBuku}`)
      .then((res) => res.json())
      .then((data) => {
        selectBookCategory.options[data.id_kategori - 1].selected = true;
        judulBuku.value = data.judul_buku;
        penulis.value = data.penulis;
        penerbit.value = data.penerbit;
      });
  });
});

closeModalBtn.addEventListener("click", resetFormModalBuku);
btnClose.addEventListener("click", resetFormModalBuku);
