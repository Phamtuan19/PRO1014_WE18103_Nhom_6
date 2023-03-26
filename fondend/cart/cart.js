// tăng giảm số lượng trong giỏ hàng
let amountElement=document.getElementById('amount');
        let amount = amountElement.value;
        let render=(amount)=>{
            amountElement.value=amount
        }
        let handlePlus=()=>{
                amount ++;
                render(amount);
        }
        let handleMinus=()=>{
            if(amount>1)
                amount --;
                render(amount);
        }
        amountElement.addEventListener('input',()=>{
            amount=amountElement.value;
            amount=parseInt(amount);
            amount=(isNaN(amout)||amount==0)?1:amount;
            render(amount);
        })
        //chọn tất cả sản phẩm trong cart
        const allCheckBoxes = document.querySelector(".all");
        const allCheckBoxes2 = document.querySelector(".all2");
        const selectAllBoxesChild = document.querySelectorAll(".allcheck"&&"#checkall");
        function hehe(){   
            selectAllBoxesChild.forEach((checkbox) => {
            checkbox.checked = true;
});      
        }
allCheckBoxes.addEventListener("click", function () {
if (this.checked) {
selectAllBoxesChild.forEach((checkbox) => {
  checkbox.checked = true;
});
} else {
selectAllBoxesChild.forEach((checkbox) => {
  checkbox.checked = false;
});
}
})
allCheckBoxes2.addEventListener("click", function () {
  if (this.checked) {
  selectAllBoxesChild.forEach((checkbox) => {
    checkbox.checked = true;
  });
  } else {
  selectAllBoxesChild.forEach((checkbox) => {
    checkbox.checked = false;
  });
  }
  });