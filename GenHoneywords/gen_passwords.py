import pickle

import torch

import generator

CUDA = False
VOCAB_SIZE = 5000
MAX_SEQ_LEN = 20
START_LETTER = 0
BATCH_SIZE = 32
MLE_TRAIN_EPOCHS = 100
ADV_TRAIN_EPOCHS = 50
POS_NEG_SAMPLES = 10000

GEN_EMBEDDING_DIM = 32
GEN_HIDDEN_DIM = 32
DIS_EMBEDDING_DIM = 64
DIS_HIDDEN_DIM = 64

result_gen_path='./data/gen_result.trc'

def save_generated_samples(gen, num_samples, filename='generated_passwords.txt'):
    generated_samples = gen.sample(num_samples=num_samples)

    # 假设你有一个 index_to_char 字典来将索引转换为字符
    with open('./data/index_to_char.pkl', 'rb') as f:
        index_to_char = pickle.load(f)

    decoded_passwords = []
    for sample in generated_samples:
        decoded_password = ''.join([index_to_char[idx.item()] for idx in sample])
        decoded_passwords.append(decoded_password)

    # 保存生成的口令到文本文件
    with open(filename, 'w') as f:
        for password in decoded_passwords:
            f.write(password + '\n')

    print(f"Generated samples saved to {filename}")

gen = generator.Generator(GEN_EMBEDDING_DIM, GEN_HIDDEN_DIM, VOCAB_SIZE, MAX_SEQ_LEN, gpu=CUDA)
gen.load_state_dict(torch.load(result_gen_path))
save_generated_samples(gen,40)