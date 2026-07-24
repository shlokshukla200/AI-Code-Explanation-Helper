# 🚀 AI Code Explanation Helper

An intelligent, web-based developer tool powered by the **Google Gemini API** that instantly breaks down, explains, and analyzes code snippets in a simple and detailed manner. 

Built as part of a **15-Day Web Development Internship**, this project bridges the gap between complex source code and clear, understandable developer explanations.

---

## ✨ Features

- **Detailed Code Breakdown:** Get structured explanations for any code snippet.
- **Strict Domain Guardrails:** Custom-engineered system prompts ensure the AI stays strictly focused on code explanation, safely refusing off-topic queries or prompt injections.
- **Multi-Language Support:** Works seamlessly across various programming languages.
- **Secure Server-Side Integration:** Built with PHP to securely protect and hide API keys away from client-side exposure.
- **Clean Developer UI:** Responsive layout styled with modern CSS for a smooth developer experience.

---

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP (Server-side rendering & API routing)
- **AI Integration:** Google Gemini API

---

## 📁 Project Structure

```text
AI-Code-Explanation-Helper/
│
├── index.php         # Homepage & input interface
├── code.php          # Backend handler & Gemini API integration
├── about.php         # About the project and creator
├── navbar.html       # Shared navigation component
├── style.css         # Custom application styling
└── Images/           # Project assets and backgrounds
```

---

## 🚀 Getting Started Locally

Follow these steps to set up and run the project locally on your machine.

### Prerequisites
- A local PHP server environment (such as **XAMPP**, **WampServer**, or PHP's built-in CLI server).
- A valid **Google Gemini API Key** (obtained from [Google AI Studio](https://aistudio.google.com/)).

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/shlokshukla200/AI-Code-Explanation-Helper.git
   ```

2. **Navigate to the project directory:**
   ```cd AI-Code-Explanation-Helper```

3. **Configure your API Key:**
   - Open `code.php` and insert your Google Gemini API key into the designated configuration variable.

4. **Run the local server:**
   - If you have PHP installed globally, run:
     ```bash
     php -S localhost:8000
     ```
   - Alternatively, place the project folder inside your XAMPP `htdocs` directory and start Apache via the XAMPP Control Panel.

5. **Open in your browser:**
   - Go to `http://localhost:8000` (or your local server path) to start exploring code!

---

## 💡 Prompt Engineering & Safety Guardrails

To ensure the assistant provides reliable assistance, the core prompt incorporates strict guardrails:
- **Role Constraint:** Forces the model to act exclusively as a code explanation helper.
- **Fallback Mechanism:** Explicitly instructs the model to reject non-coding text or off-topic prompts with a standardized response.
- **Injection Protection:** Shields against prompt hijacking attempts hidden inside user-submitted code blocks.

---

## 🎯 Internship Experience

This project was developed during an intensive **15-Day Web Development Internship**. It provided hands-on experience with:
- Integrating modern third-party REST APIs (Google Gemini).
- Handling secure server-side requests using PHP.
- Designing practical, user-focused developer tooling.
- Implementing robust prompt engineering and guardrails.

---
