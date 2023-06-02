@CHARSET "UTF-8";
body {
 padding-top: 50px;
}

.form_col {
  display: inline-block;
  margin-right: 15px;
  padding: 3px 0px;
  width: 200px;
  min-height: 1px;
  text-align: right;
}

input {
  padding: 2px;
  border: 1px solid #CCC;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  outline: none; /* Retire la bordure orange appliquée par certains navigateurs (Chrome notamment) lors du focus des éléments <input> */
}

input:focus {
  border-color: rgba(82, 168, 236, 0.75);
  -webkit-box-shadow: 0 0 8px rgba(82, 168, 236, 0.5);
  box-shadow: 0 0 8px rgba(82, 168, 236, 0.5);
}

.correct {
  border-color: rgba(68, 191, 68, 0.75);
}

.correct:focus {
  border-color: rgba(68, 191, 68, 0.75);
  -webkit-box-shadow: 0 0 8px rgba(68, 191, 68, 0.5);
  box-shadow: 0 0 8px rgba(68, 191, 68, 0.5);
}

.incorrect {
  border-color: rgba(191, 68, 68, 0.75);
}

.incorrect:focus {
  border-color: rgba(191, 68, 68, 0.75);
  -webkit-box-shadow: 0 0 8px rgba(191, 68, 68, 0.5);
  box-shadow: 0 0 8px rgba(191, 68, 68, 0.5);
}

.tooltip {
  display: none;
  margin-left: 20px;
  padding: 2px 4px;
  border: 1px solid #555;
  background-color: #CCC;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}