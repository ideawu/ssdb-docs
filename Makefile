all:
	mkdir -p docs
	cp -r resources/* docs/
	php gen_doc.php src docs

clean:
	rm -rf docs/*

