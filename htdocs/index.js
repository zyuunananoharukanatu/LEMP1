const clickSendAnswerButton = () => {
    const inputAnswer = document.getElementById('answer').value;
    if (!inputAnswer) {
      alert('回答してね');
      return ;
    }
    axios.post('/api.php', {
      dummy: "test",
      answer: inputAnswer,
    })
    .then(function (response) {
      console.log(response);
      location.href = 'done.html';
    })
    .catch(function (error) {
      console.log(error);
    });
  }