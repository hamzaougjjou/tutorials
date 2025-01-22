import Header from "./components/header/Header";
import Home from "./pages/home/Home";
import './lang/i18n';

function App() {
  return (
    <div className="m-auto">
      <Header />
      <Home />
    </div>
  );
}

export default App;