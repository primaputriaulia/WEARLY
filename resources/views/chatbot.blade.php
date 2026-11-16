
<div class="chatbot-wrapper">

    <!-- Tombol Chatbot -->
    <button type="button" class="chatbot-toggle" id="chatbotToggle"
        onclick="toggleChatbot()" aria-label="Buka WEARLY Assistant">
        <span id="toggleIcon">💬</span>
    </button>

    <!-- Kotak Chatbot -->
    <div class="chatbot-box" id="chatbotBox">

        <!-- Header -->
        <div class="chatbot-header">
            <div class="chatbot-profile">
                <div class="chatbot-avatar">W</div>

                <div class="chatbot-header-info">
                    <strong>WEARLY Assistant</strong>
                    <span>
                        <span class="online-indicator"></span>
                        Asisten Belanja
                    </span>
                </div>
            </div>

            <button type="button" class="chatbot-close"
                onclick="toggleChatbot()" aria-label="Tutup chatbot">
                &times;
            </button>
        </div>

        <!-- Area Percakapan -->
        
        <div class="chatbot-messages" id="chatbotMessages">

            <div class="message-row bot-row">
                <div class="message-avatar">W</div>

                <div class="bot-message welcome-message">
                    <p>Halo! Selamat datang di <strong>WEARLY</strong> 👋</p>

                    <p>
                        Aku WEARLY Assistant. Senang bisa membantu kamu
                        menemukan outfit yang cocok!
                    </p>

                    <p>
                        Kamu bisa bertanya tentang produk, harga, stok,
                        rekomendasi pakaian, dan cara berbelanja.
                    </p>

                    <p>Mau mulai cari outfit apa hari ini? 😊</p>
                </div>
            </div>

            <div class="quick-question-wrapper" id="quickQuestions">

                <span class="quick-question-title">Pertanyaan yang sering diajukan</span>

                <button type="button" class="quick-question"
                    onclick="sendQuickQuestion('Aku mau cari outfit buat kuliah')">
                    Outfit untuk kuliah
                </button>

                <button type="button" class="quick-question"
                    onclick="sendQuickQuestion('Ada produk di bawah 100 ribu?')">
                    Produk di bawah Rp100 ribu
                </button>

                <button type="button" class="quick-question"
                    onclick="sendQuickQuestion('Bagaimana cara checkout?')">
                    Bagaimana cara checkout?
                </button>

                <button type="button" class="quick-question"
                    onclick="sendQuickQuestion('Bagaimana cara pembayaran?')">
                    Metode pembayaran
                </button>

                <button type="button" class="quick-question"
                    onclick="sendQuickQuestion('Bagaimana cara melihat status pesanan?')">
                    Cek status pesanan
                </button>

            </div>

        </div>

        <!-- Indikator Mengetik -->
        <div class="typing-wrapper" id="typingWrapper" style="display: none;">
            <div class="message-avatar">W</div>

            <div class="typing-indicator">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Input -->
        <div class="chatbot-input-area">

            <div class="chatbot-input">
                <input
                    type="text"
                    id="chatbotInput"
                    placeholder="Tulis pesan kamu..."
                    maxlength="1000"
                    autocomplete="off"
                    onkeydown="handleChatKey(event)"
                >

                <button type="button" id="sendButton"
                    onclick="sendMessage()" aria-label="Kirim pesan">
                    <svg viewBox="0 0 24 24" width="19" height="19"
                        fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M22 2 11 13"></path>
                        <path d="m22 2-7 20-4-9-9-4Z"></path>
                    </svg>
                </button>
            </div>

            <p class="chatbot-footer">
                WEARLY Assistant · Teman belanja kamu
            </p>

        </div>

    </div>

</div>


<style>
/* ==============================
   CHATBOT WRAPPER
============================== */

.chatbot-wrapper {
    position: fixed;
    right: 25px;
    bottom: 25px;
    z-index: 9999;
    font-family: 'DM Sans', Arial, sans-serif;
}

/* ==============================
   FLOATING BUTTON
============================== */

.chatbot-toggle {
    width: 60px;
    height: 60px;
    border: none;
    border-radius: 50%;
    background: #2f2925;
    color: #f5e9d8;
    font-size: 25px;
    cursor: pointer;
    box-shadow: 0 6px 22px rgba(47, 41, 37, 0.25);
    transition: all 0.25s ease;
}

.chatbot-toggle:hover {
    background: #d6b98c;
    color: #2f2925;
    transform: translateY(-3px);
}

/* ==============================
   CHATBOT BOX
============================== */

.chatbot-box {
    position: absolute;
    right: 0;
    bottom: 75px;
    width: 370px;
    height: 540px;
    max-height: calc(100vh - 110px);
    background: #f8f5f0;
    border: 1px solid #e8ded2;
    border-radius: 20px;
    box-shadow: 0 12px 45px rgba(47, 41, 37, 0.18);
    display: none;
    flex-direction: column;
    overflow: hidden;
    animation: chatbotAppear 0.25s ease;
}

.chatbot-box.active {
    display: flex;
}

@keyframes chatbotAppear {
    from {
        opacity: 0;
        transform: translateY(12px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ==============================
   HEADER
============================== */

.chatbot-header {
    padding: 17px 19px;
    background: #2f2925;
    color: #f5e9d8;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
}

.chatbot-profile {
    display: flex;
    align-items: center;
    gap: 11px;
}

.chatbot-avatar,
.message-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #d6b98c;
    color: #2f2925;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: Georgia, serif;
    font-size: 19px;
    font-weight: bold;
    flex-shrink: 0;
}

.chatbot-header-info strong {
    display: block;
    font-size: 14px;
    font-weight: 700;
}

.chatbot-header-info span {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 5px;
    font-size: 11px;
    color: #d8c7ae;
}

.online-indicator {
    width: 7px;
    height: 7px;
    background: #9fbd91;
    border-radius: 50%;
}

.chatbot-close {
    border: none;
    background: transparent;
    color: #f5e9d8;
    font-size: 27px;
    cursor: pointer;
    line-height: 1;
    transition: 0.2s;
}

.chatbot-close:hover {
    color: #d6b98c;
    transform: rotate(90deg);
}

/* ==============================
   MESSAGE AREA
============================== */

.chatbot-messages {
    flex: 1;
    min-height: 0;
    padding: 20px 15px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 16px;
    scroll-behavior: smooth;
}

.chatbot-messages::-webkit-scrollbar {
    width: 5px;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: #d8cabb;
    border-radius: 10px;
}

.message-row {
    display: flex;
    align-items: flex-end;
    gap: 8px;
    width: 100%;
}

.bot-row {
    justify-content: flex-start;
}

.user-row {
    justify-content: flex-end;
}

.message-avatar {
    width: 27px;
    height: 27px;
    font-size: 14px;
}

.bot-message,
.user-message {
    max-width: 82%;
    padding: 11px 13px;
    border-radius: 14px;
    font-size: 12.5px;
    line-height: 1.65;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

.bot-message {
    background: #eee7df;
    color: #39312b;
    border-bottom-left-radius: 4px;
}

.user-message {
    background: #2f2925;
    color: #f8f5f0;
    border-bottom-right-radius: 4px;
}

.message-time {
    display: block;
    margin-top: 8px;
    font-size: 9px;
    opacity: 0.6;
}

/* ==============================
   TYPING INDICATOR
============================== */

.typing-wrapper {
    padding: 0 15px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

.typing-indicator {
    display: flex;
    align-items: center;
    gap: 4px;
    background: #eee7df;
    padding: 12px 14px;
    border-radius: 12px;
}

.typing-indicator span {
    width: 6px;
    height: 6px;
    background: #947b61;
    border-radius: 50%;
    animation: typingBounce 1s infinite ease-in-out;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.15s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.3s;
}

@keyframes typingBounce {
    0%, 60%, 100% {
        transform: translateY(0);
    }

    30% {
        transform: translateY(-5px);
    }
}

/* ==============================
   INPUT AREA
============================== */

.chatbot-input-area {
    padding: 12px 13px 10px;
    background: #fff;
    border-top: 1px solid #e8ded2;
    flex-shrink: 0;
}

.chatbot-input {
    display: flex;
    align-items: center;
    gap: 8px;
}

.chatbot-input input {
    flex: 1;
    min-width: 0;
    padding: 12px 13px;
    border: 1px solid #e3d9ce;
    border-radius: 10px;
    outline: none;
    background: #faf8f5;
    color: #2f2925;
    font-family: inherit;
    font-size: 12px;
    transition: 0.2s;
}

.chatbot-input input:focus {
    border-color: #b99b75;
    background: #fff;
}

.chatbot-input input::placeholder {
    color: #a99c8e;
}

.chatbot-input button {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border: none;
    border-radius: 10px;
    background: #2f2925;
    color: #f5e9d8;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.2s;
}

.chatbot-input button:hover:not(:disabled) {
    background: #d6b98c;
    color: #2f2925;
}

.chatbot-input button:disabled {
    opacity: 0.45;
    cursor: not-allowed;
}

.chatbot-footer {
    margin: 8px 0 0;
    text-align: center;
    font-size: 9px;
    color: #a99c8e;
}

/* ==============================
   RESPONSIVE
============================== */

@media (max-width: 480px) {

    .chatbot-wrapper {
        right: 15px;
        bottom: 15px;
    }

    .chatbot-box {
        width: calc(100vw - 30px);
        height: min(540px, calc(100dvh - 105px));
        bottom: 72px;
    }

    .chatbot-messages {
        padding: 16px 12px;
    }

    .bot-message,
    .user-message {
        max-width: 88%;
    }

}

    
/* ==============================
   WELCOME MESSAGE
============================== */

.welcome-message {
    white-space: normal;
}

.welcome-message p {
    margin: 0 0 10px;
}

.welcome-message p:last-child {
    margin-bottom: 0;
}

/* ==============================
   QUICK QUESTIONS
============================== */

.quick-question-wrapper {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
    padding-left: 35px;
    margin-top: -5px;
}

.quick-question-title {
    font-size: 11px;
    color: #8b7968;
    font-weight: 600;
    margin-bottom: 2px;
}

.quick-question {
    padding: 8px 12px;
    border: 1px solid #d9c9b7;
    border-radius: 20px;
    background: #fff;
    color: #493c33;
    font-family: inherit;
    font-size: 11px;
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: left;
}

.quick-question:hover {
    background: #2f2925;
    color: #f5e9d8;
    border-color: #2f2925;
    transform: translateX(3px);
}

</style>


<script>
/* ==============================
   CHATBOT INTERACTION
============================== */

let chatbotIsLoading = false;

function toggleChatbot() {
    const chatbot = document.getElementById('chatbotBox');
    const toggleIcon = document.getElementById('toggleIcon');

    chatbot.classList.toggle('active');

    toggleIcon.textContent = chatbot.classList.contains('active')
        ? '×'
        : '💬';

    if (chatbot.classList.contains('active')) {
        document.getElementById('chatbotInput').focus();
    }
}

function handleChatKey(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
}


function addMessage(message, type) {
    const container = document.getElementById('chatbotMessages');

    const row = document.createElement('div');

    row.classList.add(
        'message-row',
        type === 'user' ? 'user-row' : 'bot-row'
    );

    if (type === 'bot') {
        const avatar = document.createElement('div');
        avatar.className = 'message-avatar';
        avatar.textContent = 'W';
        row.appendChild(avatar);
    }

    const bubble = document.createElement('div');

    bubble.className = type === 'user'
        ? 'user-message'
        : 'bot-message';

    if (type === 'bot') {
        // Mendukung format **tebal** dari controller.
        const parts = message.split(/(\\?\*\\?\*.*?\\?\*\\?\*)/g);

        parts.forEach(part => {
            const isBold = /^\\?\*\\?\*.*\\?\*\\?\*$/.test(part);

            if (isBold) {
                const strong = document.createElement('strong');

                strong.textContent = part
                    .replace(/^\\?\*\\?\*/, '')
                    .replace(/\\?\*\\?\*$/, '');

                bubble.appendChild(strong);
            } else {
                bubble.appendChild(document.createTextNode(part));
            }
        });
    } else {
        bubble.textContent = message;
    }

    row.appendChild(bubble);
    container.appendChild(row);

    container.scrollTop = container.scrollHeight;
}

function setLoading(isLoading) {
    chatbotIsLoading = isLoading;

    const typing = document.getElementById('typingWrapper');
    const button = document.getElementById('sendButton');
    const input = document.getElementById('chatbotInput');

    typing.style.display = isLoading ? 'flex' : 'none';
    button.disabled = isLoading;
    input.disabled = isLoading;

    if (!isLoading) {
        input.focus();
    }

    document.getElementById('chatbotMessages').scrollTop =
        document.getElementById('chatbotMessages').scrollHeight;
}


function sendQuickQuestion(question) {
    const input = document.getElementById('chatbotInput');

    input.value = question;

    // Hilangkan tombol pertanyaan setelah pengguna memilih.
        function sendQuickQuestion(question) {
        const input = document.getElementById('chatbotInput');
        input.value = question;
        sendMessage();
    }

    sendMessage();
}


async function sendMessage() {
    const input = document.getElementById('chatbotInput');
    const message = input.value.trim();

    if (!message || chatbotIsLoading) {
        return;
    }

    addMessage(message, 'user');
    input.value = '';

    setLoading(true);

    try {
        const response = await fetch("{{ route('chatbot.chat') }}", {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },

            body: JSON.stringify({
                message: message
            })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Terjadi kesalahan pada server.');
        }

        addMessage(
            data.reply || 'Maaf, aku belum bisa memberikan jawaban saat ini.',
            'bot'
        );

    } catch (error) {
        console.error('Chatbot error:', error);

        addMessage(
            'Maaf, terjadi kendala saat menghubungkan ke WEARLY Assistant. Silakan coba lagi, ya.',
            'bot'
        );

    } finally {
        setLoading(false);
    }
}
</script>
