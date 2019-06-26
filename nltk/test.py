#!/usr/bin/env python3.7.3
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from nltk.stem import SnowballStemmer

text = nltk.word_tokenize("Había una vez una iguana con una ruana de lana")

gu = nltk.pos_tag(text)
print(gu)
