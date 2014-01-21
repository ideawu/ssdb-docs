all:
	cp -r resources/* docs/
	php gen_doc.php src docs

clean:
	rm -rf docs/*

